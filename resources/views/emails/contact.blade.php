<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>
<body style="background: #f4f8fb; padding: 0; margin: 0; font-family: 'Segoe UI', Arial, sans-serif;">
    <div style="max-width: 600px; margin: 32px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px #0001; overflow: hidden;">
        <div style="background: #174ea6; padding: 32px 0 16px 0; text-align: center;">
            <img src="{{ asset('assets/images/footpoweracademy-removebg.png') }}" alt="FootPower Academy Logo" style="max-width: 120px; margin-bottom: 16px;">
            <h1 style="color: #fff; margin: 0; font-size: 1.7rem; letter-spacing: 1px;">FootPower Academy</h1>
        </div>
        <div style="padding: 32px 24px 24px 24px;">
            <h2 style="color: #174ea6; margin-top: 0;">New Contact Form Submission</h2>
            <table style="width: 100%; margin-bottom: 18px;">
                <tr>
                    <td style="font-weight: bold; color: #174ea6; width: 120px;">Name:</td>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; color: #174ea6;">Phone:</td>
                    <td>{{ $phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; color: #174ea6;">Email:</td>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; color: #174ea6;">Subject:</td>
                    <td>{{ $subject }}</td>
                </tr>
            </table>
            <div style="background: #e3ecfa; border-left: 4px solid #174ea6; padding: 18px 16px; border-radius: 8px; color: #222; margin-bottom: 20px;">
                <div style="font-weight: bold; color: #174ea6; margin-bottom: 6px;">Message:</div>
                <div style="white-space: pre-line;">{{ $message }}</div>
            </div>
            <div style="font-size: 0.95rem; color: #888; text-align: center; margin-top: 32px;">
                &copy; {{ date('Y') }} FootPower Academy. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
