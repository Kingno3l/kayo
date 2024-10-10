<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table width="100%" bgcolor="#f4f4f4" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td style="padding: 20px;">
                            <h1 style="color: #333333; margin: 0;">Welcome, {{ $user->name }}!</h1>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666; margin: 20px 0;">Thank you for registering. Here are your login credentials:</p>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666; margin: 20px 0;">
                                <strong>Email:</strong> {{ $user->email }}<br>
                                <strong>Password:</strong> {{ $password }}
                            </p>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666; margin: 20px 0;">You can now log in using these credentials.</p>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666; margin: 20px 0;">Thank you!</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: center; font-size: 12px; color: #999999;">
                            <p>&copy; {{ date('Y') }} YIPS. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
