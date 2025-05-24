<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Auth::routes();

// Inicio (Home)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Recursos
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('llaves', App\Http\Controllers\LlafeController::class);
Route::resource('pqrs', App\Http\Controllers\PqrController::class);
Route::resource('transacciones', App\Http\Controllers\transaccioneController::class);

// API
Route::get('/api/buscar', [App\Http\Controllers\LlafeController::class, 'buscarPorValor'])->name('llaves.buscar');

// Vistas personalizadas
Route::get('/home/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home.dashboard');
Route::get('/registro-llaves', [App\Http\Controllers\HomeController::class, 'registroLlaves'])->name('registro-llaves');
Route::get('/llaves-registradas', [App\Http\Controllers\HomeController::class, 'llavesRegistradas'])->name('llaves-registradas');
Route::get('/envios', [App\Http\Controllers\HomeController::class, 'envios'])->name('envios');
Route::get('/confirmar-envios', [App\Http\Controllers\HomeController::class, 'confirmarEnvios'])->name('confirmar-envios');
Route::get('/recibo-envio', [App\Http\Controllers\HomeController::class, 'reciboEnvio'])->name('recibo-envio');
Route::get('/configuracion', [App\Http\Controllers\HomeController::class, 'configuracion'])->name('configuracion')->middleware('auth');
Route::get('/pqrs', [App\Http\Controllers\HomeController::class, 'pqrs'])->name('pqrs');






