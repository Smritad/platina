<div style="text-align: center; margin-bottom: 20px;">
    <img src="{{ asset('frontend/assets/img/logo/logo.webp') }}" alt="Platina India" style="max-height: 80px;">
</div>

<h2 style="text-align: center;">New Contact Form Submission</h2>

<p><strong>Name:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Phone:</strong> {{ $details['phone'] }}</p>
<p><strong>Subject:</strong> {{ $details['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $details['message'] }}</p>


