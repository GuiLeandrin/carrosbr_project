<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
</head>
<body style="margin:0; padding:0; background-color:#4778ff; font-family:'Montserrat', Arial, sans-serif;">

    <table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="border:0; background-color:#4778ff; padding: 40px 0;">
        <tr>
            <td style="text-align: center;">
                <table role="presentation" cellspacing="0" cellpadding="0" width="90%" style="max-width:600px; background-color:transparent; text-align:center; border:0; margin: 0 auto;">
                    <tr>
                        <td style="color:#fff; font-size:32px; font-weight:700; padding-bottom:20px;">
                            CarrosBR
                        </td>
                    </tr>

                    <tr>
                        <td style="color:#ffffff; font-size:16px; line-height:1.6; padding:0 20px;">
                            Você solicitou a redefinição de senha da sua conta.<br>
                            Clique no botão abaixo para criar uma nova senha.
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px 0; text-align: center;">
                            <a href="{{ $actionUrl }}" style="background-color:#ffffff; color:#4778ff; text-decoration:none; padding:14px 28px; border-radius:6px; font-weight:600; display:inline-block;">
                                Redefinir Senha
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="color:#ffffff; font-size:14px; padding:0 20px;">
                            Este link é válido por 60 minutos.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
