<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoggedInUserDetails;
use App\Models\OrderDetail;
use App\Models\ProductDetails;
use Illuminate\Support\Str;
use App\Models\ProductSabCategory;
use App\Models\ProductCategory;


class MyAccountController extends Controller
{
    // Show profile page with prefilled user data

public function index()
{
    $user = Auth::guard('frontend')->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to access your account.');
    }

    $orders = OrderDetail::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($order) {
            // Decode quantity and normalize
            $quantities = json_decode($order->quantities, true);
            $quantities = is_array($quantities) ? $quantities : [$quantities];

            // Sum total quantity
            $order->total_quantity = array_sum($quantities);

            return $order;
        });
        
    $user = Auth::guard('frontend')->user();
    $latestOrder = null;
    $billingAddress = null;
    $shippingAddress = null;

    if ($user) {
        $latestOrder = OrderDetail::where('user_id', $user->id)
            ->latest()
            ->first();
        if ($latestOrder) {
            $billingAddress = $latestOrder->billing_address ?? null;
            $shippingAddress = $latestOrder->shipping_address ?? null;
        }
    }



    return view('frontend.myaccountprofile', compact('user', 'orders','billingAddress', 'shippingAddress'));
}


    // Update user account details
    public function updateAccount(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required',
            'state'     => 'required',
        ]);

        $user = Auth::guard('frontend')->user();

        if ($user) {
            $user->fname = $request->firstname;
            $user->lname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->state = $request->state;
            $user->save();

            return back()->with('success', 'Account updated successfully.');
        }

        return back()->with('error', 'User not found.');
    }

    // Update user password
    public function updatePassword(Request $request)
    {
       // dd($request);
        $request->validate([
            'password_current' => 'required',
            'password_new' => 'required|min:6|confirmed',
        ]);
        $user = Auth::guard('frontend')->user();

        if ($user && Hash::check($request->password_current, $user->password)) {
            $user->password = Hash::make($request->password_new);
            $user->save();
            return back()->with('message', 'Password updated successfully.');
        }

        return back()->with('error', 'Current password is incorrect.');
    }




public function viewOrder($id)
{
    $user = Auth::guard('frontend')->user();

    $order = OrderDetail::where('order_id', $id)
        ->where('user_id', $user->id)
        ->firstOrFail();

    // Decode JSON fields safely
    $productIds   = json_decode($order->product_ids, true) ?? [];

    // Default values
    $categoryName = 'N/A';
    $subCategoryName = 'N/A';

    if (!empty($productIds)) {
        // Get first product
        $product = ProductDetails::where('id', $productIds[0])->first();

        if ($product) {
            // Get category name
            $category = ProductCategory::find($product->product_category_id);
            $categoryName = $category->category_name ?? 'N/A';

            // Get subcategory name
            $subCategory = ProductSabCategory::find($product->product_sab_category_id);
            $subCategoryName = $subCategory->sab_category_name ?? 'N/A';
        }
    }

    // (existing code for items...)
    $quantities   = json_decode($order->quantities, true) ?? [];
    $sizes        = json_decode($order->sizes, true) ?? [];
    $colors       = json_decode($order->colors, true) ?? [];
    $prices       = json_decode($order->prices, true) ?? [];
    $productNames = json_decode($order->product_names, true) ?? [];
    $images       = json_decode($order->images, true) ?? [];

    $productIds   = is_array($productIds)   ? $productIds   : [$productIds];
    $quantities   = is_array($quantities)   ? $quantities   : [$quantities];
    $sizes        = is_array($sizes)        ? $sizes        : [$sizes];
    $colors       = is_array($colors)       ? $colors       : [$colors];
    $prices       = is_array($prices)       ? $prices       : [$prices];
    $productNames = is_array($productNames) ? $productNames : [$productNames];
    $images       = is_array($images)       ? $images       : [$images];

    $items = collect();
    foreach ($productIds as $index => $productId) {
        $items->push([
            'name'     => $productNames[$index] ?? 'N/A',
            'image'    => $images[$index] ?? 'default.jpg',
            'price'    => $prices[$index] ?? 0,
            'quantity' => $quantities[$index] ?? 1,
            'size'     => $sizes[$index] ?? '-',
            'color'    => $colors[$index] ?? '-',
            'total'    => ($prices[$index] ?? 0) * ($quantities[$index] ?? 1),
        ]);
    }

    $totalPrice = $order->total_price ?? 0;

    return view('frontend.orderdetails', compact('order', 'items', 'totalPrice', 'categoryName', 'subCategoryName'));
}




public function updateAddress(Request $request)
{
    $request->validate([
        'address' => 'required|string|max:1000',
        'type' => 'required|in:billing,shipping',
    ]);

    $user = Auth::guard('frontend')->user();

    $order = OrderDetail::where('user_id', $user->id)
        ->latest()
        ->first();

    if ($order) {
        $field = $request->type . '_address';
        $order->$field = $request->address;
        $order->save();
    }

    return redirect()->back()->with('success', ucfirst($request->type) . ' address updated.');
}


}
