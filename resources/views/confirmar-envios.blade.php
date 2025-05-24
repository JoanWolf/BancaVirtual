<link rel="stylesheet" href="{{ asset('css/confirmar-envios.css') }}">

<div class="envios-container">
    <h1>Envíos de dinero</h1>

    <div class="envios-card">
        <div class="card-header">
            <h2>Confirma el envío</h2>
            <a href="{{ route('envios') }}" class="btn-volver">Volver</a>
        </div>

        <div class="datos-envio">
            <p><strong>Usuario:</strong> Us**** Ua****Ri****O****</p>
            <p><strong>Llave:</strong> @Bandil2345</p>
            <p><strong>Entidad:</strong> Banca Digital</p>
            <p><strong>Monto:</strong> $50.000</p>
        </div>

        <a href="{{ route('recibo-envio') }}" class="btn-continuar">Confirmar</a>
    </div>
</div>
