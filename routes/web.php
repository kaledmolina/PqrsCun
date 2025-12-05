<?php

use App\Http\Controllers\PqrsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [PqrsController::class, 'index'])->name('home');
Route::get('/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
Route::get('/pqrs/consult', [PqrsController::class, 'consult'])->name('pqrs.consult');
Route::get('/test-pdf', function () {
    $answer = "Este es un texto de prueba para la respuesta de la PQR.\n\nSegunda línea de prueba.";
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.pqrs-answer', ['answer' => $answer]);
    return $pdf->stream();
});

Route::get('/debug-ssl', function (Request $request) {
    return [
        'url' => $request->url(),
        'secure' => $request->secure(),
        'scheme' => $request->getScheme(),
        'root' => $request->root(),
        'headers' => $request->headers->all(),
        'server' => $request->server->all(),
        'app_url_config' => config('app.url'),
    ];
});
