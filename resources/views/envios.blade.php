<link rel="stylesheet" href="{{ asset('css/envios.css') }}">

<div class="envios-container">
    <h1>Envíos de dinero</h1>

    <div class="envios-card">
        <div class="card-header">
            <h2>¿A Quién Deseas Enviarle Dinero?</h2>
            <a href="{{ route('home') }}" class="btn-volver">Volver</a>
        </div>

        <div class="formulario-envio">
        <form method="POST" action="{{ route('confirmar-envios') }}">
            @csrf
            <label class="instruccion">Escribe la llave de quien deseas que reciba el dinero</label>
            <input type="text" name="llave" class="input-llave" placeholder="@ejemplo123" required>

            <small class="nota">Ten en cuenta que las llaves alfanuméricas siempre comienzan con @</small>

            <input type="number" name="monto" class="input-cantidad" placeholder="Monto" required min="1" max="{{ Auth::user()->Saldo }}">
            <label class="saldo-actual">Saldo disponible: ${{ number_format(Auth::user()->Saldo, 2) }}</label>

            <textarea name="mensaje" class="descripcion" placeholder="Escribe aquí tu mensaje..." required></textarea>

            <button type="submit" class="btn-continuar">Continuar</button>
        </form>
        </div>

    </div>
</div>
