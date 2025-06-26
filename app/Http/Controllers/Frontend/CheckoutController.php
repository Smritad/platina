<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\SizeDetails;
use App\Models\FabricType;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Models\LoggedInUserDetails;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;


class CheckoutController extends Controller
{
  
    public function storeCheckoutData(Request $request)
{
    $cartData = $request->cart;

    // You can store this data in session or database as per your requirement
    session()->put('checkout_cart', $cartData);

    return response()->json(['success' => true]);
}



   public function showCheckout()
{
    $checkoutCart = session()->get('checkout_cart', []);

    $cartTotal = collect($checkoutCart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    return view('frontend.checkout-details', compact('checkoutCart', 'cartTotal'));
}



public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:255'
    ]);

    $email = $request->email;

    // Generate OTP
    $otp = rand(100000, 999999);

    // Store or update OTP
    Otp::updateOrCreate(
        ['email' => $email],
        ['otp' => $otp, 'created_at' => now()]
    );

    // Send Email
    try {
        Mail::raw("Your OTP for login is: $otp", function ($message) use ($email) {
            $message->to($email)->subject('Your OTP for Login');
        });

        return response()->json(['success' => true, 'message' => 'OTP sent successfully!']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
    }
}


public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6'
    ]);

    $otpRecord = Otp::where('email', $request->email)->first();

    if (!$otpRecord) {
        return response()->json(['success' => false, 'message' => 'Invalid OTP.']);
    }

    if (Carbon::parse($otpRecord->created_at)->addMinutes(5)->isPast()) {
        return response()->json(['success' => false, 'message' => 'OTP expired. Please request again.']);
    }

    if ($otpRecord->otp != $request->otp) {
        return response()->json(['success' => false, 'message' => 'OTP does not match.']);
    }

    // Find or create user from logged_in_user_details
    $user = LoggedInUserDetails::where('email', $request->email)->first();
    if (!$user) {
        $user = LoggedInUserDetails::create([
            'email' => $request->email,
            'created_at' => now()
        ]);
    }

    Auth::guard('frontend')->login($user);

    // OTP no longer needed
    $otpRecord->delete();

    return response()->json([
        'success' => true,
        'message' => 'OTP Verified Successfully!',
        'redirect' => url()->current()
    ]);
}

    
}
