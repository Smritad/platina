<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        $records = FooterDetails::latest()->get();
        return view('frontend.contactus', compact('records'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // 1️⃣ Send mail to admin with CC
        try {
            Mail::send('emails.contact_admin', ['details' => $details], function ($message) use ($details) {
                $message->to('contact@platinaindia.com')
                        ->cc(['shweta@matrixbricks.com', 'onkar@matrixbricks.com', 'smrita@matrixbricks.com'])
                        ->subject('Contact Us Enquiry');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send contact mail to admin: ' . $e->getMessage());
        }

        // 2️⃣ Send thank-you mail to user
        try {
            Mail::send('emails.contact_user', ['details' => $details], function ($message) use ($details) {
                $message->to($details['email'])
                        ->subject('Thank You for Your Enquiry');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send thank-you mail to user: ' . $e->getMessage());
        }

        // 3️⃣ Redirect to thank-you page
        return view('frontend.thankyou');
    }
}
