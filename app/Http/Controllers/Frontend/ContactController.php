<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        $records = FooterDetails::latest()->get();
        return view('frontend.contactus', compact('records'));
    }

    public function send(Request $request)
    {
        // ✅ Validation (subject & message are optional, reCAPTCHA required)
        $request->validate([
            'name'                 => 'required|string|max:255',
            'email'                => 'required|email',
            'phone'                => 'required|string|max:20',
            'g-recaptcha-response' => 'required',
        ]);

        // ✅ reCAPTCHA Verification
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secret = '6Ldlr3ErAAAAAMDSHJXlZdbHOCucVogLENr_eP65'; // 🔁 Replace with your reCAPTCHA secret key

        $verifyResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => $secret,
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip(),
        ]);

        $responseBody = $verifyResponse->json();

        if (!($responseBody['success'] ?? false)) {
            return back()->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.'])->withInput();
        }

        // ✅ Collect Form Data
        $details = [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject ?? '',
            'message' => $request->message ?? '',
        ];

        // ✅ Send Mail to Admin
        try {
            Mail::send('emails.contact_admin', ['details' => $details], function ($message) use ($details) {
                $message->to('contact@platinaindia.com')
                        ->cc(['shweta@matrixbricks.com', 'onkar@matrixbricks.com', 'smrita@matrixbricks.com'])
                        ->subject('Contact Us Enquiry');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send contact mail to admin: ' . $e->getMessage());
        }

        // ✅ Send Thank You Mail to User
        try {
            Mail::send('emails.contact_user', ['details' => $details], function ($message) use ($details) {
                $message->to($details['email'])
                        ->subject('Thank You for Your Enquiry');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send thank-you mail to user: ' . $e->getMessage());
        }

        // ✅ Redirect to Thank You Page
        return redirect()->route('Thank.you');
    }
}
