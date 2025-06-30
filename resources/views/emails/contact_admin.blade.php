<div style="text-align: center; margin-bottom: 20px; background-color: #000; padding: 10px;">
    <img src="{{ asset('frontend/assets/img/logo/logo.webp') }}" alt="Platina India" style="max-height: 80px;">
</div>

<h2 style="text-align: center;">New Contact Form Submission</h2>

<p><strong>Name:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Phone:</strong> {{ $details['phone'] }}</p>
<p><strong>Subject:</strong> {{ $details['subject'] }}</p>
<p><strong>Message:</strong> {{ $details['message'] }}</p>

<!-- Footer -->
<div style="margin-top: 40px; text-align: center; border-top: 1px solid #ccc; padding-top: 20px; font-size: 14px; color: #777;">
    &copy; {{ date('Y') }} PLATINA INDIA™. All rights reserved.<br>
</div>

