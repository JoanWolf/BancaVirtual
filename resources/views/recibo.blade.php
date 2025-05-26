<link rel="stylesheet" href="{{ asset('css/recibo.css') }}">

<div class="recibo-container">
    <h1 class="recibo-title">Envíos de dinero</h1>

    <div class="recibo-card">
        <h2>Recibo</h2>


        <div class="recibo-grid">
            <strong>Para</strong> <span>{{ $transaccion->user_receptor->Nombre }} {{ $transaccion->user_receptor->Apellido }}</span>
            <strong>Llave</strong> <span>{{ $transaccion->llafe->Valor }}</span>
            <strong>Banco</strong> <span>Banca Digital</span>
            <strong>Fecha</strong> <span>{{ \Carbon\Carbon::parse($transaccion->Fecha_Envio)->format('d/m/Y') }}</span>
            <strong>¿Cuánto?</strong> <span>${{ number_format($transaccion->Monto, 0, ',', '.') }}</span>
            <strong>Referencia</strong> <span>{{ $transaccion->Referencia }}</span>
        </div>

        <div class="recibo-botones">
            <a href="{{ route('home') }}" class="btn-listo">Listo</a>
            <a href="{{ route('recibo-envio.pdf', $transaccion->id) }}" class="btn-descargar">Descargar</a>
        </div>

    </div>
</div>
