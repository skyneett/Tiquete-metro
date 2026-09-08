<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formulariometro\TiqueteMetroController;
use App\Http\Controllers\formulariometro\AdminMetroController;

Route::get('/login-metro', [TiqueteMetroController::class, 'loginView'])->name('metro.login');
Route::post('/login-metro', [TiqueteMetroController::class, 'loginPost'])->name('metro.login.post');
Route::get('/logout-metro', [TiqueteMetroController::class, 'logout'])->name('metro.logout');

Route::get('/inicio-metro', [TiqueteMetroController::class, 'inicioView'])->name('metro.inicio');
Route::get('/formulario-metro', [TiqueteMetroController::class, 'create'])->name('metro.create');
Route::post('/formulario-metro', [TiqueteMetroController::class, 'store'])->name('metro.store');
Route::get('/api/barrios-por-comuna/{comuna}', [TiqueteMetroController::class, 'getBarriosPorComuna'])->name('metro.barrios');

// TODO: envolver en middleware(['auth', 'role:admin']) cuando se implemente el sistema de roles real.
Route::get('/admin/solicitudes-metro', [AdminMetroController::class, 'index'])->name('admin.metro.solicitudes');
Route::get('/admin/solicitudes-metro/data', [AdminMetroController::class, 'listadoJson'])->name('admin.metro.solicitudes.data');
Route::post('/admin/solicitudes-metro/{id}/estado', [AdminMetroController::class, 'cambiarEstado'])->name('admin.metro.cambiar-estado');

Route::get('/admin/validar-solicitud/{id}', [AdminMetroController::class, 'validar'])->name('admin.metro.validar');
Route::get('/admin/ver-formulario/{id}', [AdminMetroController::class, 'verFormulario'])->name('admin.metro.ver-formulario');
Route::post('/admin/revisar-adjunto/{id}', [AdminMetroController::class, 'revisarAdjunto'])->name('admin.metro.revisar-adjunto');
Route::post('/admin/validar-solicitud/{id}/decision', [AdminMetroController::class, 'guardarDecision'])->name('admin.metro.guardar-decision');
Route::post('/admin/finalizar-revision/{id}', [AdminMetroController::class, 'finalizarRevision'])->name('admin.metro.finalizar-revision');

