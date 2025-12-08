<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoapController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| La URL final será: https://pqr.intalnet.com/api/cun-service
| Estas rutas NO tienen protección CSRF, por lo que son ideales para SOAP.
|
*/

// 1. Endpoint POST: Aquí es donde la SIC enviará los datos XML
Route::post('/cun-service', [SoapController::class, 'handle']);

// 2. Endpoint GET: Para que tú (y la SIC) puedan descargar/ver el WSDL
Route::get('/cun-service', function () {
    $path = public_path('wsdl/WSConsultaOperador.wsdl');
    
    if (file_exists($path)) {
        return response()->file($path, [
            'Content-Type' => 'text/xml; charset=utf-8' // Importante para que el navegador lo muestre bien
        ]);
    }
    
    return response('WSDL no encontrado. Verifica la carpeta public/wsdl', 404);
});