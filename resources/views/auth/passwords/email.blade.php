@extends('layouts.app')

@section('content')

{{-- Vincula tu CSS personalizado --}}
<link rel="stylesheet" href="{{ asset('css/email.css') }}">

<div class="forgot-wrapper">
    <div class="forgot-container">

        {{-- Logo --}}
        <img src="{{ asset('images/Logo2.png') }}" alt="Banca Digital" class="logo">

        {{-- Título --}}
        <h2 class="title">¿Olvidaste Tu Contraseña?</h2>
        <p class="description">
            Introduce tu dirección de correo electrónico y te enviaremos un código de seguridad para restablecer tu contraseña
        </p>

        {{-- Feedback de sesión --}}
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('password.email') }}" class="forgot-form">
            @csrf

            <input id="email" type="email"
                   name="email"
                   placeholder="Correo"
                   value="{{ old('email') }}"
                   class="@error('email') is-invalid @enderror"
                   required autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn-submit">
                Enviar código
            </button>
        </form>

        {{-- Enlace de regreso --}}
        <a href="{{ route('login') }}" class="back-link">Volver al inicio</a>
    </div>
</div>

@endsection
