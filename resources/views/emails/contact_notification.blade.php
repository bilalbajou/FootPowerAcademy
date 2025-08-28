<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background: #e0e7ef;">
    <div style="background: url('https://footpoweracademy.com/assets/images/soccer-bg.jpg') center/cover no-repeat fixed; min-height: 100vh; padding: 0;">
        <div style="max-width: 420px; margin: 48px auto; background: rgba(255,255,255,0.95); border-radius: 18px; box-shadow: 0 4px 24px #2563eb22; padding: 40px 32px 32px 32px; text-align: center; position: relative;">
            <img src="{{ asset('assets/images/footpoweracademy-removebg.png') }}" alt="FootPower Academy" style="width: 200px; margin-bottom: 18px;">
            <h2 style="color: #2563eb; font-size: 1.75rem; font-weight: bold; margin-bottom: 12px;">New Contact Form Submission</h2>
            <div style="background: #f1f5f9; border-radius: 8px; padding: 16px; margin-bottom: 18px; text-align: left;">
                <p style="margin: 0 0 6px 0;"><strong>Name:</strong> {{ $data['name'] }}</p>
                <p style="margin: 0 0 6px 0;"><strong>Email:</strong> {{ $data['email'] }}</p>
                <p style="margin: 0 0 6px 0;"><strong>Phone:</strong> {{ $data['phone'] }}</p>
                <p style="margin: 0 0 6px 0;"><strong>Subject:</strong> {{ $data['subject'] }}</p>
                <p style="margin: 0;"><strong>Message:</strong><br>{{ $data['message'] }}</p>
            </div>
            <p style="color: #64748b; font-size: 0.98rem; margin-bottom: 0;">This message was sent from the FootPower Academy website contact form.</p>
        </div>
    </div>
</body>
</html>
