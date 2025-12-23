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
            <img src="{{ asset('images/logo.png') }}" alt="Intalnet Logo" class="logo">
        </div>
        
        <div class="content">
            @php
                $signaturePath = storage_path('app/private/firma.png');
                $signedContent = $responseContent;
                
                // Check if signature exists and replace placeholder with CID attachment
                if (file_exists($signaturePath)) {
                    // $message is a variable automatically available in Mailable views
                    $cid = $message->embed($signaturePath);
                    $signedContent = str_replace(
                        '[[FIRMA_GERENTE]]', 
                        '<img src="' . $cid . '" alt="Firma" width="120" style="display: block; margin-bottom: 5px;">', 
                        $signedContent
                    );
                } else {
                    // Fallback if signature not found
                    $signedContent = str_replace('[[FIRMA_GERENTE]]', '<p>__________________________________</p>', $signedContent);
                }
            @endphp
            {!! $signedContent !!}
        </div>
        
        <div class="footer">
            <p>Este es un mensaje automático, por favor no responda a este correo.</p>
            <p>&copy; {{ date('Y') }} Intalnet. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
