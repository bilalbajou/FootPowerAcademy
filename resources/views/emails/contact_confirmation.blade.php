<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting FootPower Academy</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8fafc; color: #1e293b;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #e0e7ef; padding: 32px;">
        <h2 style="color: #2563eb;">Thank you for reaching out!</h2>
        <p>Dear {{ $data['name'] }},</p>
        <p>We have received your message and will get back to you as soon as possible.</p>
        <hr>
        <h4>Your Message:</h4>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        <p><strong>Message:</strong><br>{{ $data['message'] }}</p>
        <hr>
        <p>If you have any urgent queries, feel free to reply to this email.</p>
        <p>Best regards,<br>FootPower Academy Team</p>
    </div>
</body>
</html>
