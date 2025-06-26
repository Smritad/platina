<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\RegisterDetails;
use App\Models\LoggedInUserDetails;
use App\Models\ProductDetails;
use App\Models\Carts;
use App\Models\GuestSession;

class RegisterController extends Controller
{
   public function register()
{
   
    return view('frontend.register');
}

public function authenticate_register(Request $request)
{
    $messages = [
        'name.required' => 'Name is required',
        'name.regex' => 'Name should not contain numbers or special characters',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'email.unique' => 'The email is already taken.',
        'phone.required' => 'Phone number is required.',
        'phone.regex' => 'Phone number must be 10 digits.',
        'password.required' => 'The password field is required.',
        'password.string' => 'The password must be a string.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'agree_checkbox.accepted' => 'You must agree to the terms and conditions.',
    ];

    $validated = $request->validate([
        'name' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|regex:/^[0-9]{10}$/',
        'password' => 'required|string|min:8|confirmed',
        'agree_checkbox' => 'accepted',
    ], $messages);

    $user = new LoggedInUserDetails();  // Corrected
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'];
    $user->password = \Hash::make($validated['password']);
    $user->status = 1;
    $user->save();

    return redirect()->route('user.login')->with('message', 'Account created successfully! Please log in.');
}


public function login(Request $request)
    {
        return view('frontend.login');
    }


public function authenticate_login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string',
    ], [
        'email.required' => 'Email Id is required',
        'password.required' => 'Password is required',
    ]);

    $user = LoggedInUserDetails::where('email', $request->email)->first();

    if ($user && \Hash::check($request->password, $user->password)) {
        // Login the user using frontend guard
        Auth::guard('frontend')->login($user, $request->has('remember'));
        $request->session()->regenerate();

        // Check for guest cart session
        $guestSession = DB::table('guest_user_details')
            ->orderBy('inserted_at', 'desc')
            ->value('session_id');

        if ($guestSession) {
            $cartItems = Carts::where('session_id', $guestSession)->get();

            DB::transaction(function () use ($cartItems, $user) {
                foreach ($cartItems as $cart) {
                    $cart->update([
                        'user_id' => $user->id,
                        'session_id' => null
                    ]);
                }
            });
        }

        return redirect()->route('frontend.index')->with('message', 'Login Successfully!');
    }

    // If user not found or password doesn't match
    return redirect()->route('user.login')->with([
        'Input' => $request->only('email'),
        'message' => 'Credentials do not match our records!'
    ]);
}


    public function logout(Request $request) 
{
     Session::flush();
    Auth::guard('frontend')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('frontend.index')->with('message', 'Logout Successfully!');
}

   public function authenticate_checkout_register(Request $request)
    {
        $messages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    
        $validated = $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'
            ],
            'password' => 'required|string|min:8',
        ], $messages);
    
        $name = explode('@', $validated['email'])[0];
    
        // Check if user already exists, else create new one
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            ['name' => $name, 'password' => Hash::make($validated['password']), 'status' => 1]
        );
    
        // Update the session ID for existing cart items (No condition on login)
        $sessionId = Session::getId();
        Carts::where('session_id', $sessionId)->update([
            'user_id' => $user->id,
            'session_id' => null 
        ]);
    
        // Delete guest session record AFTER updating carts
        GuestSession::where('session_id', $sessionId)->delete();
    
        Session::regenerate();


        return response()->json([
            'success' => true,
            'message' => 'Account created successfully! Please log in.',
            'redirect' => route('user.login')
        ]);
    }
    
    
    

}

