<?php

use App\Http\Controllers\PqrsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PqrsController::class, 'index'])->name('home');
Route::get('/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
Route::get('/pqrs/consult', [PqrsController::class, 'consult'])->name('pqrs.consult');
