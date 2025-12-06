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


Route::middleware(['auth'])->group(function () {
    Route::get('/private-attachments/{path}', [App\Http\Controllers\AttachmentController::class, 'show'])
        ->where('path', '.*')
        ->name('private.attachments.show');
});

