<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Code</title>
    <style>
        body {
            font-family: 'Segoe UI', 'Arial', sans-serif;
            background: #f4f8fb;
            padding: 0;
            margin: 0;
        }
        .container {
            max-width: 420px;
            margin: 40px auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(30,64,175,0.05);
            padding: 32px 28px;
            border: 1px solid #e3eafc;
        }
        .logo {
            text-align: center;
            margin-bottom: 18px;
        }
        .logo img {
            width: 120px;
            height: auto;
            display: inline-block;
        }
        .title {
            font-size: 1.35rem;
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 16px;
            text-align: center;
        }
        .otp {
            display: block;
            font-size: 2.1rem;
            font-weight: 700;
            letter-spacing: 8px;
            color: #2563eb;
            background: #f1f5fd;
            border-radius: 8px;
            padding: 16px 0;
            text-align: center;
            margin: 20px 0 28px 0;
        }
        .desc {
            color: #334155;
            margin-bottom: 24px;
            text-align: center;
        }
        .small {
            font-size: 0.95rem;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/images/footpoweracademy-removebg.png') }}" alt="FootPower Academy Logo">
        </div>
        <div class="title">Verify Your Email Address</div>
        <div class="desc">
            Welcome to FootPower Academy!<br>
            Please use the following One-Time Password (OTP) to verify your email address. This code is valid for 10 minutes.
        </div>
        <div class="otp">{{ $otp }}</div>
        <div class="desc">
            If you did not create an account, no further action is required.
        </div>
        <div class="small">
            &copy; {{ date('Y') }} FootPower Academy. All rights reserved.
        </div>
    </div>
</body>
</html>
