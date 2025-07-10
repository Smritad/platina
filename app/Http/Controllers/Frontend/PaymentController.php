<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Session;
use Exception;
use Carbon\Carbon;

use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\OrderStatus;


class PaymentController extends Controller
{

   

public function processPayment(Request $request)
{
    $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

    // Step 1: Calculate subtotal
    $subtotal = 0;
    foreach ($request->order_data['cart_items'] as $item) {
        $subtotal += floatval($item['subtotal']);
    }

    // Step 2: Determine applicable GST
    $state = $request->order_data['customer_info']['state'] ?? '';
    $gstInfo = $request->order_data['gst_info'] ?? [];

    $totalGst = 0;

    if (strtolower(trim($state)) === 'maharashtra') {
        // Intra-state (CGST + SGST)
        $cgst = floatval($gstInfo['cgst'] ?? 0);
        $sgst = floatval($gstInfo['sgst'] ?? 0);
        $totalGst = $cgst + $sgst;
    } else {
        // Inter-state (IGST)
        $totalGst = floatval($gstInfo['igst'] ?? 0);
    }

    // Step 3: Calculate total amount
    $totalAmount = $subtotal + $totalGst;

    // Step 4: Prepare Razorpay order data
    $orderData = [
        'receipt' => 'test_order_' . rand(),
        'amount' => round($totalAmount * 100), // in paise
        'currency' => 'INR',
        'payment_capture' => 1
    ];

    try {
        $order = $api->order->create($orderData);

        return response()->json([
            'order_id'     => $order['id'],
            'razorpay_key' => config('services.razorpay.key'),
            'amount'       => $totalAmount,
            'currency'     => 'INR',
            'mode'         => 'test'
        ]);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}



   public function verifyPayment(Request $request)
{
    try {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        \Log::info("Received Razorpay Payment Data", $request->all());

        if (!$request->has(['razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature'])) {
            \Log::error("Missing Razorpay payment parameters.");
            return response()->json([
                'status' => 'Payment Verification Error',
                'error'  => 'Missing Razorpay payment parameters.'
            ], 400);
        }

        // Signature validation
        $expectedSignature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
            config('services.razorpay.secret')
        );

        \Log::info("Expected Signature: " . $expectedSignature);
        \Log::info("Received Signature: " . $request->razorpay_signature);

        if ($expectedSignature !== $request->razorpay_signature) {
            \Log::error("Signature Mismatch! Possible tampering.");
            return response()->json([
                'status' => 'Payment Verification Failed',
                'error'  => 'Invalid Signature'
            ], 403);
        }

        // Order data processing
        $status = 1;
        $orderData = $request->order_data;

        if (!empty($orderData) && isset($orderData['cart_items'])) {
            $productIds   = [];
            $productNames = [];
            $quantities   = [];
            $unitPrices   = []; // for DB
            $subtotals    = []; // for GST calc
            $images       = [];
            $sizes        = [];
            $colors       = [];

            foreach ($orderData['cart_items'] as $cartItem) {
                $productIds[]   = (int) ($cartItem['product_id'] ?? 0);
                $productNames[] = trim($cartItem['product_name']);
                $quantities[]   = (int) ($cartItem['quantity'] ?? 1);
                $unitPrices[]   = (int) str_replace(',', '', $cartItem['price']);
                $subtotals[]    = (int) str_replace(',', '', $cartItem['subtotal']);
                $images[]       = $cartItem['image'] ?? null;
                $sizes[]        = $cartItem['size'] ?? "";
                $colors[]       = $cartItem['print'] ?? "";
            }

            try {
                if (Auth::check()) {
                    $user = Auth::guard('frontend')->user();
                    $updateData = [];

                    if (empty($user->phone) && !empty($orderData['customer_info']['phone'])) {
                        $updateData['phone'] = $orderData['customer_info']['phone'];
                    }

                    if (empty($user->last_name) && !empty($orderData['customer_info']['last_name'])) {
                        $updateData['last_name'] = $orderData['customer_info']['last_name'];
                    }

                    if (!empty($updateData)) {
                        $user->update($updateData);
                        \Log::info("User details updated", $updateData);
                    }
                }

                // GST Calculation
                $state = strtolower($orderData['customer_info']['state'] ?? '');
                $gstInfo = $orderData['gst_info'] ?? [];

                $cgst = $state === 'maharashtra' ? floatval($gstInfo['cgst'] ?? 0) : 0;
                $sgst = $state === 'maharashtra' ? floatval($gstInfo['sgst'] ?? 0) : 0;
                $igst = $state !== 'maharashtra' ? floatval($gstInfo['igst'] ?? 0) : 0;
                $totalGst = $cgst + $sgst + $igst;

                $subtotal = array_sum($subtotals);
                $totalPrice = $subtotal + $totalGst;

                // Save order
                $order = OrderDetail::create([
                    'user_id'         => Auth::guard('frontend')->check() ? Auth::guard('frontend')->id() : null,
                    'order_id'        => $request->razorpay_order_id,
                    'payment_id'      => $request->razorpay_payment_id,
                    'customer_name'   => $orderData['customer_info']['first_name'] . ' ' . $orderData['customer_info']['last_name'],
                    'customer_email'  => $orderData['customer_info']['email'],
                    'customer_phone'  => $orderData['customer_info']['phone'],
                    'street'          => $orderData['customer_info']['street'],
                    'city'            => $orderData['customer_info']['city'],
                    'state'           => $orderData['customer_info']['state'],
                    'postal_code'     => $orderData['customer_info']['postal_code'],
                    'country'         => $orderData['customer_info']['country'],
                    'billing_address' => $orderData['customer_info']['billing_address'],
                    'shipping_address'=> $orderData['customer_info']['shipping_address'],
                    'description'     => $orderData['customer_info']['description'],
                    'cgst'            => $cgst,
                    'sgst'            => $sgst,
                    'igst'            => $igst,
                    'total_price'     => $totalPrice,
                    'status'          => $status,
                    'product_ids'     => json_encode($productIds, JSON_UNESCAPED_UNICODE),
                    'product_names'   => json_encode($productNames, JSON_UNESCAPED_UNICODE),
                    'quantities'      => json_encode($quantities, JSON_UNESCAPED_UNICODE),
                    'prices'          => json_encode($unitPrices, JSON_UNESCAPED_UNICODE),
                    'subtotals'       => json_encode($subtotals, JSON_UNESCAPED_UNICODE), // optional
                    'images'          => json_encode($images, JSON_UNESCAPED_UNICODE),
                    'sizes'           => json_encode($sizes, JSON_UNESCAPED_UNICODE),
                    'colors'          => json_encode($colors, JSON_UNESCAPED_UNICODE),
                    'created_at'      => Carbon::now(),
                    'created_by'      => Auth::guard('frontend')->check() ? Auth::guard('frontend')->id() : null,
                ]);

                // Save order status
                OrderStatus::create([
                    'user_id'           => Auth::check() ? Auth::id() : null,
                    'order_id'          => $order->order_id,
                    'order_status'      => 'Order Placed',
                    'status_updated_at' => Carbon::now(),
                    'status_updated_by' => Auth::check() ? Auth::id() : null,
                ]);
if ($order->customer_email) {
    \App\Models\LoggedInUserDetails::updateOrCreate(
        ['email' => $order->customer_email], // match by email
        [
            'name'  => trim(($orderData['customer_info']['first_name'] ?? '') . ' ' . ($orderData['customer_info']['last_name'] ?? '')),
            'email'     => $orderData['customer_info']['email'] ?? '',
            'phone'     => $orderData['customer_info']['phone'] ?? '',
           
        ]
    );

    \Log::info("User saved to LoggedInUserDetails for email: " . $order->customer_email);
}
                // Decrement stock
                foreach ($productIds as $index => $productId) {
                    DB::table('product_details')
                        ->where('id', $productId)
                        ->decrement('available_quantity', $quantities[$index]);
                }

                // Clear cart
                if (Auth::guard('frontend')->check()) {
                    $userId = Auth::guard('frontend')->id();

                    DB::table('carts')
                        ->where('user_id', $userId)
                        ->get()
                        ->filter(function ($cart) use ($productIds) {
                            $cartProductIds = json_decode($cart->product_id, true);
                            return count(array_intersect($productIds, (array) $cartProductIds)) > 0;
                        })
                        ->each(function ($cart) {
                            DB::table('carts')->where('id', $cart->id)->delete();
                        });
                }

                // Generate Invoice PDF
                $invoiceNumber = mt_rand(10000000, 99999999);
                $invoiceFileName = 'invoice_' . $invoiceNumber . '.pdf';
                $pdfDirectory = public_path('/platina/invoices');

                if (!File::exists($pdfDirectory)) {
                    File::makeDirectory($pdfDirectory, 0777, true, true);
                }

                $pdfPath = $pdfDirectory . '/' . $invoiceFileName;
                $order->update(['invoice_id' => $invoiceNumber]);

                $pdf = Pdf::loadView('frontend.invoice_pdf', ['order' => json_decode(json_encode($order), true)]);
                $pdf->save($pdfPath);

                // Send Invoice Email
                Mail::send('frontend.invoice_mail', ['order' => $order], function ($message) use ($order, $pdfPath, $invoiceFileName) {
                    $message->to($order->customer_email)
                            ->cc('smrita@matrixbricks.com')
                            ->subject('Your Invoice - ' . $order->invoice_id)
                            ->attach($pdfPath, [
                                'as'   => $invoiceFileName,
                                'mime' => 'application/pdf',
                            ]);
                });

                Log::info("Invoice Email Sent to: " . $order->customer_email);
            } catch (\Exception $e) {
                \Log::error("Order Insert Error: " . $e->getMessage());
                return response()->json([
                    'status' => 'DB Error',
                    'error'  => $e->getMessage()
                ], 500);
            }
        }
        return response()->json(['status' => 'success']);

    } catch (\Exception $e) {
        Log::error("Razorpay Verification Error: " . $e->getMessage());

        return response()->json([
            'status' => 'Payment Verification Error',
            'error'  => $e->getMessage()
        ], 500);
    }
}

}