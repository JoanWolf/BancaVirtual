@php
use Illuminate\Support\Str;
@endphp
<link rel="stylesheet" href="{{ asset('css/confirmar-envios.css') }}">

<div class="envios-container">
    <h1>Envíos de dinero</h1>

    <div class="envios-card">
        <div class="card-header">
            <h2>Confirma el envío</h2>
            <a href="{{ route('envios') }}" class="btn-volver">Volver</a>
        </div>


        <form method="POST" action="{{ route('procesar-envio') }}">
            @csrf
            <input type="hidden" name="llave_id" value="{{ $datos['llave']->id }}">
            <input type="hidden" name="monto" value="{{ $datos['monto'] }}">
            <input type="hidden" name="mensaje" value="{{ $datos['mensaje'] }}">

            <div class="datos-envio">
                <p><strong>Usuario:</strong>
                    {{ Str::mask($datos['receptor']->Nombre, '*', 3) }}
                    {{ Str::mask($datos['receptor']->Apellido, '*', 3) }}
                </p>
                <p><strong>Llave:</strong> {{ $datos['llave']->Valor }}</p>
                <p><strong>Entidad:</strong> Banca Digital</p>
                <p><strong>Monto:</strong> ${{ number_format($datos['monto'], 0, ',', '.') }}</p>
            </div>

            <button type="submit" class="btn-continuar">Confirmar</button>
        </form>

    </div>
</div>
