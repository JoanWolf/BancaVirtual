<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// Página de bienvenida
Route::get('/', function () {
    return redirect()->route('login');
});

// Autenticación
Auth::routes();

// Inicio (Home)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Recursos
// Route::resource('users', App\Http\Controllers\UserController::class);
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
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/users/create', [App\Http\Controllers\HomeController::class, 'createUser'])->name('users.create');
Route::get('/users/{user}/edit', [App\Http\Controllers\HomeController::class, 'editUser'])->name('users.edit');
Route::get('/users/{user}', [App\Http\Controllers\HomeController::class, 'showUser'])->name('users.show');

//POST
Route::post('/llaves/guardar-formulario', [App\Http\Controllers\LlafeController::class, 'storeFromFormulario'])->name('llaves.guardarDesdeFormulario');
Route::post('/users', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('users.store');

//put
Route::put('/users/{user}', [App\Http\Controllers\HomeController::class, 'updateUser'])->name('users.update');

//delete
Route::delete('/users/{user}', [App\Http\Controllers\HomeController::class, 'destroyUser'])->name('users.destroy');



