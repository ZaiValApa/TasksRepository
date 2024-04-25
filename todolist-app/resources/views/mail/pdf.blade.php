<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Tarea Completada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-top: 8px solid #4a90e2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 28px;
            color: #4a90e2;
            margin-bottom: 10px;
        }

        .message {
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 14px;
            color: #666666;
            text-align: left;
        }

        .footer p {
            margin: 10px 0;
        }

        .signature {
            font-style: italic;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="title">¡Tarea Completada!</h2>
        </div>
        <div class="content">
            <p class="message">Hey Admin,</p>
            <p class="message">{{ $name }} ha completado la asignación de {{ $tarea }}.</p>
        </div>
        <div class="footer">
            <p>Saludos,</p>
            <p class="signature">El equipo de Mailtrap</p>
        </div>
    </div>
</body>
</html>
