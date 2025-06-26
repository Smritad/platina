<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterDetails;

use Illuminate\Support\Facades\Mail;


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

        Mail::to('smrita@matrixbricks.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('message', 'Your message has been sent successfully!');
    }


    
    
}
