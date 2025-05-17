@extends('layouts.app')

@section('content')

<!-- Enlace correcto al archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">

    <div class="login-left">
        <h2 class="login-title">Bienvenido a tu banca online</h2>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Usuario o Correo" value="{{ old('email') }}" required autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Contraseña" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>

            <div class="text-link">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">¿Olvidaste Tu Contraseña?</a>
                @endif
            </div>

            <div class="text-link">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}">Registrarse aquí</a>
            </div>
        </form>
    </div>

    <!-- Lado derecho con logo -->
    <div class="login-right">
        <img src="{{ asset('images/Logo2.png') }}" alt="Logo Banca Digital" class="logo">
    </div>
</div>

{{-- @endsection --}}
