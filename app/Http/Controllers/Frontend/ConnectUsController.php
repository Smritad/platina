<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
class ConnectUsController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'product_size' => 'required',
            'product_qty' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);

        // 1️⃣ Send mail to internal team
        Mail::send('emails.connect_us', ['data' => $data], function ($message) use ($data) {
            $message->to('smrita@matrixbricks.com')
                    ->cc(['shweta@matrixbricks.com', 'onkar@matrixbricks.com'])
                    ->subject('New Product Enquiry');
        });

        // 2️⃣ Send thank-you mail to the user
        Mail::send('emails.connect_us_thankyou', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Thank You for Your Enquiry');
        });

        // 3️⃣ Redirect to thank you page
        return view('frontend.thankyou');
    }
}
