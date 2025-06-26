<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Product Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f8f7f7; padding: 20px; color: #333;">
    <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px; margin:auto; background:#f7f7f7; border:1px solid #ddd; border-radius:5px;">
        <tr style="background:#161515;">
            <td style="padding:15px; text-align:center;">
                <img src="{{ asset('frontend/assets/img/logo/logo.webp') }}" alt="Logo" style="max-width:150px;">
            </td>
        </tr>
        <tr>
            <td style="padding:20px;">
                <h2 style="color:#444; text-align:center;">Platina India | New Product Enquiry</h2>
                <table width="100%" cellpadding="5" cellspacing="0">
                    <tr><td style="font-weight:bold; width:150px;">Product Name:</td><td>{{ $data['product_name'] }}</td></tr>
                    <tr><td style="font-weight:bold;">Size:</td><td>{{ $data['product_size'] }}</td></tr>
                    <tr><td style="font-weight:bold;">Quantity:</td><td>{{ $data['product_qty'] }}</td></tr>
                    <tr><td colspan="2" style="padding-top:10px;"></td></tr>
                    <tr><td style="font-weight:bold;">Name:</td><td>{{ $data['name'] }}</td></tr>
                    <tr><td style="font-weight:bold;">Email:</td><td>{{ $data['email'] }}</td></tr>
                    <tr><td style="font-weight:bold;">Phone:</td><td>{{ $data['phone'] }}</td></tr>
                    <tr><td style="font-weight:bold;">Address:</td><td>{{ $data['address'] }}</td></tr>
                    <tr><td style="font-weight:bold; vertical-align:top;">Message:</td><td>{{ $data['message'] }}</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="background:#f2f2f2; padding:10px; text-align:center; font-size:12px; color:#888;">
                &copy; {{ date('Y') }} Platina. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
