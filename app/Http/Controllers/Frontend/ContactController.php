<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetails;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\ThankYouMail; // New mail for user

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

        // 1️⃣ Send mail to admin with CC using view
        Mail::to('smrita@matrixbricks.com')
            ->cc(['shweta@matrixbricks.com', 'onkar@matrixbricks.com'])
            ->send(new ContactMail($details));

        // 2️⃣ Send thank-you mail to user using view
        Mail::to($details['email'])->send(new ThankYouMail($details));

        // 3️⃣ Redirect to thank you page
        return view('frontend.thankyou');
    }
}
