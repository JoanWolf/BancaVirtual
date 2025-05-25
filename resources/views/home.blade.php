<!-- resources/views/home.blade.php -->

{{-- @extends('layouts.app') --}}

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

{{-- @section('content') --}}
<!-- Enlace al CSS personalizado para home -->
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<div class="dashboard-container">

    <!-- Sidebar izquierdo -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/Logo2.png') }}" alt="Banca Digital">
        </div>
        <ul class="menu">
            <!-- Opción para mostrar dashboard -->
            <li><a href="{{ route('home') }}"><i class="fas fa-chart-line"></i> Home</a></li>
            <li><a href="{{ route('registro-llaves') }}"><i class="fas fa-key"></i> Llaves</a></li>
            <li><a href="{{ route('envios') }}"><i class="fas fa-paper-plane"></i> Envíos</a></li>
            <li><a href="{{ route('configuracion') }}"><i class="fas fa-cog"></i> Configuración</a></li>
            <li><a href="{{ route('pqrs') }}"><i class="fas fa-envelope"></i> PQRS</a></li>
            <li><a href="{{ route('users') }}"><i class="fas fa-chart-line"></i> Users</a></li>

        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">

        <!-- Ícono de usuario con menú desplegable -->
        <div class="user-menu">
            <div class="user-icon" id="user-icon">
                <img src="{{ asset('images/user-icon.png') }}" alt="Usuario">
            </div>
            <div class="dropdown-content" id="dropdown-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Cerrar sesión</button>
                </form>
            </div>
        </div>

        <!-- Aquí se inyecta el contenido dinámico -->
        @if (view()->exists($subview ?? ''))
            @include($subview)
        @endif

    </div>

</div>

<!-- Script para el menú desplegable -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userIcon = document.getElementById("user-icon");
        const dropdown = document.getElementById("dropdown-menu");

        userIcon.addEventListener("click", function(e) {
            e.stopPropagation();
            dropdown.classList.toggle("show-dropdown");
        });

        window.addEventListener("click", function() {
            if (dropdown.classList.contains("show-dropdown")) {
                dropdown.classList.remove("show-dropdown");
            }
        });
    });
</script>
{{-- @endsection --}}
