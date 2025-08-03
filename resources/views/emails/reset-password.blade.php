<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
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
        .title {
            font-size: 1.35rem;
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 16px;
            text-align: center;
        }
        .desc {
            font-size: 1rem;
            color: #334155;
            margin-bottom: 24px;
            text-align: center;
        }
        .btn {
            display: block;
            width: 100%;
            background: #2563eb;
            color: #fff !important;
            text-decoration: none;
            padding: 12px 0;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
            margin: 24px 0;
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
        <div style="text-align:center; margin-bottom: 18px;">
            <img src="{{ asset('assets/images/footpoweracademy-removebg.png') }}" alt="FootPower Academy Logo" style="width:120px; height:auto; display:inline-block;" />
        </div>
        <div class="title">Reset Your Password</div>
        <div class="desc">
            You are receiving this email because we received a password reset request for your account.
        </div>
        <a href="{{ $resetUrl }}" class="btn">Reset Password</a>
        <div class="desc" style="margin-bottom: 10px;">
            This password reset link will expire in 60 minutes.
        </div>
        <div class="small">
            If you did not request a password reset, no further action is required.
        </div>
    </div>
</body>
</html>
