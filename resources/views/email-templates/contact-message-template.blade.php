<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Mensagem de Contato</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f7;font-family:Arial,Helvetica,sans-serif;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f4f4f7;">
        <tr>
            <td align="center" style="padding:40px 16px;">

                <!-- Card -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:600px;background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color:#4f46e5;padding:36px 40px;">
                            <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:700;letter-spacing:0.5px;">
                                Nova Mensagem de Contato
                            </h1>
                            <p style="margin:8px 0 0;color:#c7d2fe;font-size:14px;">
                                Recebida em {{ isset($received_at) ? $received_at : now()->format('d/m/Y \à\s H:i') }}
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:36px 40px;">

                            <p style="margin:0 0 24px;color:#374151;font-size:15px;line-height:1.6;">
                                Você recebeu uma nova mensagem pelo formulário de contato do site.
                            </p>

                            <!-- Info fields -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">

                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e5e7eb;">
                                        <span style="display:block;font-size:11px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px;">Nome</span>
                                        <span style="font-size:15px;color:#111827;font-weight:600;">{{ $name }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e5e7eb;">
                                        <span style="display:block;font-size:11px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px;">E-mail</span>
                                        <a href="mailto:{{ $email }}" style="font-size:15px;color:#4f46e5;text-decoration:none;">{{ $email }}</a>
                                    </td>
                                </tr>

                                @isset($subject)
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e5e7eb;">
                                        <span style="display:block;font-size:11px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px;">Assunto</span>
                                        <span style="font-size:15px;color:#111827;">{{ $subject }}</span>
                                    </td>
                                </tr>
                                @endisset

                                <tr>
                                    <td style="padding:12px 0;">
                                        <span style="display:block;font-size:11px;font-weight:700;color:#9ca3af;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:10px;">Mensagem</span>
                                        <div style="background-color:#f9fafb;border-left:4px solid #4f46e5;border-radius:4px;padding:16px 20px;">
                                            <p style="margin:0;font-size:15px;color:#374151;line-height:1.7;white-space:pre-line;">{{ $message }}</p>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <!-- Reply button -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:32px;">
                                <tr>
                                    <td align="center">
                                        <a href="mailto:{{ $email }}" style="display:inline-block;background-color:#4f46e5;color:#ffffff;font-size:15px;font-weight:600;text-decoration:none;padding:13px 32px;border-radius:6px;">
                                            Responder Mensagem
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color:#f9fafb;padding:20px 40px;border-top:1px solid #e5e7eb;">
                            <p style="margin:0;font-size:12px;color:#9ca3af;">
                                Este e-mail foi gerado automaticamente pelo formulário de contato do seu site.<br>
                                Por favor, não responda diretamente a este e-mail — use o botão acima.
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- /Card -->

            </td>
        </tr>
    </table>

</body>
</html>
