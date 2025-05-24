<!-- resources/views/dashboard.blade.php -->

<!-- Enlace al CSS específico del dashboard -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<!-- Contenido específico del dashboard -->
<div class="balance-card">
    <p class="balance-title">Saldo Disponible</p>
    <div class="balance-value">
        <i class="fas fa-dollar-sign"></i>
        <span>{{ $saldo }}</span>
    </div>
</div>
