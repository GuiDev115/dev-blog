<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        /* Reset styles for email clients */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-color: #f5f5f5;
            color: #333333;
        }

        /* Wrapper for Outlook */
        table {
            border-spacing: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }

        .header {
            padding: 20px;
            text-align: center;
            background-color: #007bff;
        }

        .content {
            padding: 30px 20px;
            background-color: #ffffff;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }

        .footer {
            padding: 20px;
            text-align: center;
            color: #666666;
            font-size: 14px;
        }

        @media only screen and (max-width: 480px) {
            .container {
                width: 100% !important;
            }

            .content {
                padding: 20px !important;
            }
        }
    </style>
</head>
<body>
<table role="presentation" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td>
            <table role="presentation" class="container" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td class="header">
                        <h1 style="color: #ffffff; margin: 0;">Reset Your Password</h1>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <p>Hello {{ $user->name }}</p>
                        <p>We received a request to reset your password. If you didn't make this request, you can ignore this email.</p>
                        <p>To reset your password, click the button below:</p>
                        <p style="text-align: center;">
                            <a href="{{ $actionlink }}" target="_black" class="reset-button">Reset Password</a>
                        </p>
                        <p>This link will expire in 24 hours.</p>
                        <p>If the button doesn't work, copy and paste this link into your browser:</p>
                        <p style="word-break: break-all; font-size: 14px;">[Reset_Link]</p>
                        <p>Best regards,<br>[Company_Name] Team</p>
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        <p>&copy; {{ date('Y') }}. All rights reserved.</p>
                        <p>If you need help, please contact our support team.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
