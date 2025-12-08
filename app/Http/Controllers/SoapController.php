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
        // 1. Definir la ruta al archivo WSDL (Contrato)
        // Asegúrate de haber creado este archivo en public/wsdl/WSConsultaOperador.wsdl
        $wsdlPath = public_path('wsdl/WSConsultaOperador.wsdl');

        // Validar que el WSDL exista
        if (!file_exists($wsdlPath)) {
            Log::error("WSDL no encontrado en: " . $wsdlPath);
            return response('Error: WSDL no encontrado', 500);
        }

        // 2. Opciones del Servidor SOAP
        $options = [
            'cache_wsdl' => WSDL_CACHE_NONE, // Recomendado en desarrollo para ver cambios inmediatos
            'trace' => 1,                    // Permite depuración
            'exceptions' => true,            // Lanza excepciones en caso de error
        ];

        try {
            // 3. Inicializar el Servidor SOAP
            $server = new SoapServer($wsdlPath, $options);

            // 4. Vincular la clase que contiene la lógica (Tu CunService)
            // Esto le dice al servidor: "Cuando pidan 'consultaCUN', busca ese método en CunService"
            $server->setClass(CunService::class);

            // 5. Manejar la solicitud
            // Laravel captura la salida (output buffering), así que debemos obtenerla y devolverla limpiamente
            ob_start();
            $server->handle();
            $responseContent = ob_get_clean();

            // 6. Devolver respuesta con el encabezado XML correcto
            return Response::make($responseContent, 200, [
                'Content-Type' => 'text/xml; charset=ISO-8859-1', // La SIC suele requerir ISO-8859-1 o UTF-8
            ]);

        } catch (\Exception $e) {
            Log::error("Error Fatal SOAP: " . $e->getMessage());
            return response('<error>Error interno del servicio SOAP</error>', 500, ['Content-Type' => 'text/xml']);
        }
    }
}