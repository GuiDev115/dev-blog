<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Password Has Been Changed</title>
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

        .info-box {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
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
                        <h1 style="color: #ffffff; margin: 0;">Sua senha foi trocada</h1>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <p>Salve, {{ $user->name }}</p>
                        <p>Sua senha foi trocada com sucesso:</p>
                        <div class="info-box">
                            <p><strong>Username/Email:</strong> {{ $user->email }} ou {{ $user->username }}</p>
                        </div>
                        <p>Se não foi voce que fez essa solicitacao, por favor, vai a merda</p>
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        <p>&copy; {{ date('Y') }} [DevBlog]. All rights reserved.</p>
                        <p>Se voce precisar de ajuda. Pau no te cool</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
