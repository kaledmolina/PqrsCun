<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; border-bottom: 3px solid #00aaff; }
        .content { padding: 20px; background-color: #fff; }
        .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; }
        .logo { max-height: 50px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Respuesta a su Solicitud</h2>
            <p><strong>CUN:</strong> {{ $pqrs->cun }}</p>
        </div>
        
        <div class="content">
            <p>Hola <strong>{{ $pqrs->first_name }} {{ $pqrs->last_name }}</strong>,</p>
            
            <p>Hemos generado una respuesta a su solicitud de tipo <strong>{{ ucfirst($pqrs->type) }}</strong>.</p>
            
            <div style="background-color: #f8f9fa; padding: 15px; border-left: 4px solid #00aaff; margin: 20px 0;">
                {!! $responseContent !!}
            </div>
            
            <p>Si tiene alguna duda adicional, no dude en contactarnos.</p>
        </div>
        
        <div class="footer">
            <p>Este es un mensaje automático, por favor no responda a este correo.</p>
            <p>&copy; {{ date('Y') }} Intalnet. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
