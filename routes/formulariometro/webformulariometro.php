<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formulariometro\TiqueteMetroController;

Route::get('/login-metro', [TiqueteMetroController::class, 'loginView'])->name('metro.login');
Route::post('/login-metro', [TiqueteMetroController::class, 'loginPost'])->name('metro.login.post');
Route::get('/logout-metro', [TiqueteMetroController::class, 'logout'])->name('metro.logout');

Route::get('/formulario-metro', [TiqueteMetroController::class, 'create'])->name('metro.create');
Route::post('/formulario-metro', [TiqueteMetroController::class, 'store'])->name('metro.store');
Route::get('/api/barrios-por-comuna/{comuna}', [TiqueteMetroController::class, 'getBarriosPorComuna'])->name('metro.barrios');
