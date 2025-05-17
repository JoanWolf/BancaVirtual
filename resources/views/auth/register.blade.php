@extends('layouts.app')

{{-- @section('content') --}}

<!-- Enlace al CSS personalizado -->
<link rel="stylesheet" href="{{ asset('css/register.css') }}">


<div class="register-wrapper">
    <div class="register-container">

        <!-- Encabezado con logo -->
        <div class="register-header">
            <img src="{{ asset('images/Logo2.png') }}" alt="Logo Banca Digital" class="logo">
        </div>

        <!-- Formulario de registro -->
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <!-- NUEVO CONTENEDOR -->
            <div class="form-inner">

                <!-- Nombres y Apellidos -->
                <div class="form-row">
                    <input type="text" name="nombres" placeholder="Nombres" value="{{ old('nombres') }}" required>
                    <input type="text" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}"
                        required>
                </div>

                <!-- Tipo de documento y número -->
                <div class="form-row">
                    <select name="tipo_documento" required>
                        <option value="" disabled selected>Tipo de documento</option>
                        <option value="DNI">DNI</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Cédula">Cédula</option>
                    </select>

                    <input type="text" name="numero_documento" placeholder="Nº de documento"
                        value="{{ old('numero_documento') }}" required>
                </div>

                <!-- Fecha de nacimiento y teléfono -->
                <div class="form-row">
                    <input type="date" name="fecha_nacimiento" required>

                    <div class="phone-group">
                        <select name="cod_pais" required>
                            <option value="0">0</option>
                            <option value="57">+57</option>
                            <option value="2">+2</option>
                            <!-- Agrega más códigos si deseas -->
                        </select>
                        <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}"
                            required>
                    </div>
                </div>
                <br>
                <!-- Correo -->
                <!-- Correo -->
                <div class="form-row">
                    <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
                </div>


                <!-- Contraseñas -->
                <div class="form-row">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                </div>

                <!-- Botones -->
                <div class="form-buttons">
                    <button type="submit" class="btn-submit">Enviar</button>
                    <a href="{{ route('login') }}" class="btn-cancel">Cancelar</a>
                </div>
        </form>
    </div>
</div>

{{-- @endsection --}}
