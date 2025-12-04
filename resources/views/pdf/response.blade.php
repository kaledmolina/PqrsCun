<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Respuesta Oficial PQR</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #004a87;
            padding-bottom: 20px;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 10px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            color: #004a87;
            text-transform: uppercase;
        }
        .content {
            margin-bottom: 50px;
            text-align: justify;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- You can add an img tag here if you have a logo file available in public path -->
        <!-- <img src="{{ public_path('images/logo.png') }}" class="logo"> -->
        <div class="title">Respuesta Oficial a Solicitud</div>
        <div>Radicado No. {{ $pqrs->cun }}</div>
    </div>

    <div class="content">
        {!! $content !!}
    </div>

    <div class="footer">
        <p>Este documento es una respuesta oficial generada por el sistema de gestión de PQRs de CUN.</p>
        <p>Fecha de generación: {{ $date }}</p>
    </div>
</body>
</html>
