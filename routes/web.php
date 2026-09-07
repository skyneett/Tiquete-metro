<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiqueteMetroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario-metro', [TiqueteMetroController::class, 'create'])->name('metro.create');
Route::post('/formulario-metro', [TiqueteMetroController::class, 'store'])->name('metro.store');