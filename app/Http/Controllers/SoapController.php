<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Soap\CunService; // Tu servicio con la lógica de negocio
use SoapServer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class SoapController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Verificar si la extensión SOAP está instalada
        if (!extension_loaded('soap')) {
            Log::error("La extensión SOAP de PHP no está instalada/habilitada.");
            return response('<error>Servicio no disponible (Falta extensión SOAP)</error>', 500, ['Content-Type' => 'text/xml']);
        }

        // 2. Definir la ruta al archivo WSDL (Contrato)
        $wsdlPath = public_path('wsdl/WSConsultaOperador.wsdl');

        // Validar que el WSDL exista
        if (!file_exists($wsdlPath)) {
            Log::error("WSDL no encontrado en: " . $wsdlPath);
            return response('<error>WSDL no encontrado</error>', 500, ['Content-Type' => 'text/xml']);
        }

        // 3. Opciones del Servidor SOAP
        // Usamos el valos de la constante global si existe, si no 0 (aunque si falla extension_loaded arriba, esto no debería pasar)
        $cacheMode = defined('WSDL_CACHE_NONE') ? WSDL_CACHE_NONE : 0;

        $options = [
            'cache_wsdl' => $cacheMode,
            'trace' => 1,
            'exceptions' => true,
        ];

        try {
            // 4. Inicializar el Servidor SOAP
            $server = new \SoapServer($wsdlPath, $options); // Use fully qualified name

            // 5. Vincular la clase que contiene la lógica
            $server->setClass(CunService::class);

            // 6. Manejar la solicitud
            ob_start();
            $server->handle();
            $responseContent = ob_get_clean();

            // 7. Devolver respuesta con el encabezado XML correcto
            return Response::make($responseContent, 200, [
                'Content-Type' => 'text/xml; charset=ISO-8859-1', // La SIC suele requerir ISO-8859-1 o UTF-8
            ]);

        } catch (\Throwable $e) { // Catch Throwable to capture Errors and Exceptions
            Log::error("Error Fatal SOAP: " . $e->getMessage());
            // Limpiar buffer si quedó algo sucio
            if (ob_get_length())
                ob_clean();

            // Construir un XML de Fault manual si es necesario, o un mensaje simple
            $errorXml = <<<XML
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
   <SOAP-ENV:Body>
       <SOAP-ENV:Fault>
           <faultcode>SOAP-ENV:Server</faultcode>
           <faultstring>Error Interno: {$e->getMessage()}</faultstring>
       </SOAP-ENV:Fault>
   </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
XML;
            return response($errorXml, 500, ['Content-Type' => 'text/xml']);
        }
    }
}