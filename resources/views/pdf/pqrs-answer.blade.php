<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Respuesta Oficial PQR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 10px;
        }
        .content {
            margin: 0 40px;
        }
        .signature {
            margin-top: 50px;
        }
        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Placeholder for logo if needed -->
        <!-- <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo"> -->
        <h2>INTALNET TELECOMUNICACIONES</h2>
    </div>

    <div class="content">
        {!! nl2br(e($answer)) !!}
    </div>

    <div class="footer">
        <p>Generado automáticamente por el sistema de gestión de PQRS.</p>
    </div>
</body>
</html>