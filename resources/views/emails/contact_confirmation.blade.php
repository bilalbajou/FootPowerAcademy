<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting FootPower Academy</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background: #e0e7ef;">
    <div style="background: url('https://footpoweracademy.com/assets/images/soccer-bg.jpg') center/cover no-repeat fixed; min-height: 100vh; padding: 0;">
        <div style="max-width: 420px; margin: 48px auto; background: rgba(255,255,255,0.95); border-radius: 18px; box-shadow: 0 4px 24px #2563eb22; padding: 40px 32px 32px 32px; text-align: center; position: relative;">
            <img src="{{ asset('assets/images/footpoweracademy-removebg.png') }}" alt="FootPower Academy" style="width: 200px; margin-bottom: 18px;">
            <h2 style="color: #2563eb; font-size: 1.75rem; font-weight: bold; margin-bottom: 12px;">Thank you for reaching out!</h2>
            <p style="color: #1e293b; font-size: 1.1rem;">Dear <b>{{ $data['name'] }}</b>,</p>
            <p style="margin: 14px 0 18px 0; color: #334155;">We have received your message and will get back to you as soon as possible.</p>
            <div style="background: #f1f5f9; border-radius: 8px; padding: 16px; margin-bottom: 18px; text-align: left;">
                <h4 style="color: #2563eb; margin-bottom: 6px;">Your Message</h4>
                <p style="margin: 0 0 6px 0;"><strong>Subject:</strong> {{ $data['subject'] }}</p>
                <p style="margin: 0;"><strong>Message:</strong><br>{{ $data['message'] }}</p>
            </div>
            <p style="color: #64748b; font-size: 0.98rem;">If you have any urgent queries, feel free to reply to this email.</p>
            <p style="margin-top: 18px; color: #2563eb; font-weight: bold;">Best regards,<br>FootPower Academy Team ⚽</p>
        </div>
    </div>
</body>
</html>
