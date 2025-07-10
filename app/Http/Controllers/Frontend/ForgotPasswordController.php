<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\LoggedInUserDetails;
class ForgotPasswordController extends Controller
{
    public function forgot_password()
    {
        return view('frontend.forgot-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:logged_in_user_details,email',
        ], [
            'email.exists' => 'We could not find an account with that email address.',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('frontend.password-reset-mail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Your Password');
        });

        return back()->with('message', 'A password reset link has been sent to your email.');
    }

    public function reset_password($token)
    {
        return view('frontend.reset-password', compact('token'));
    }

    public function update_reset_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:logged_in_user_details,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetRecord) {
            return back()->withErrors(['email' => 'Invalid token or email.']);
        }

        LoggedInUserDetails::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('user.login')->with('message', 'Your password has been reset successfully.');
    }
}
