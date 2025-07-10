<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Your Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 600px;
      margin: 30px auto;
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      width: 150px;
      height: auto;
      display: inline-block;
    }

    h1 {
      font-size: 22px;
      color: #000;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      line-height: 1.6;
      margin: 0 0 15px;
    }

    .button-wrapper {
      text-align: center;
      margin: 30px 0;
    }

    .reset-btn {
      background-color: #000;
      color: #fff;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 30px;
      font-weight: bold;
      display: inline-block;
    }

    .reset-btn:hover {
      background-color: #333;
    }

    .footer {
      text-align: center;
      font-size: 13px;
      color: #777;
      margin-top: 30px;
    }

    hr {
      border: none;
      border-top: 1px solid #eee;
      margin: 30px 0;
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px 15px;
      }

      .reset-btn {
        padding: 12px 20px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="{{ asset('frontend/assets/img/logo/logo.webp') }}" alt="Platina" class="logo">
    </div>

    <h1>Reset Your Password</h1>
    <p>Hello,</p>
    <p>We received a request to reset your password. Click the button below to set a new password:</p>

    <div class="button-wrapper">
      <a href="{{ route('user.resetpassword', $token) }}" class="reset-btn">Reset Password</a>
    </div>
    

    <p>If you did not request a password reset, please ignore this email. Your account is still secure.</p>
    <p>For any assistance, feel free to contact our support team.</p>
    <p>Best regards,<br>Platina Team</p>

    <hr>

    <div class="footer">
      © {{ date('Y') }} Platina. All rights reserved.
    </div>
  </div>
</body>
</html>
