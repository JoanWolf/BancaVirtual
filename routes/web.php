<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ResetPasswordMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',App\Http\Controllers\UserController::class);
Route::resource('llaves',App\Http\Controllers\LlafeController::class);
Route::resource('pqrs',App\Http\Controllers\PqrController::class);
Route::resource('transacciones',App\Http\Controllers\transaccioneController::class);
Route::get('/api/buscar', [App\Http\Controllers\LlafeController::class, 'buscarPorValor'])->name('llaves.buscar');
