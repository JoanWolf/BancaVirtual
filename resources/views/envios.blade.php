


<link rel="stylesheet" href="{{ asset('css/envios.css') }}">

<div class="envios-container">
    <h1>Envíos de dinero</h1>

    <div class="envios-card">
        <div class="card-header">
            <h2>¿A Quién Deseas Enviarle Dinero?</h2>
            <a href="{{ route('home') }}" class="btn-volver">Volver</a>
        </div>

        <label class="instruccion">Escribe la llave de quien deseas que reciba el dinero</label>
        <input type="text" class="input-llave" placeholder="@ejemplo123">

        <small class="nota">Ten en cuenta que las llaves alfanuméricas siempre comienzan con @</small>

        <input type="text" class="input-cantidad" placeholder="Monto">

        <textarea class="descripcion" placeholder="Escribe aquí tu mensaje..."></textarea>


        <a href="{{ route('confirmar-envios') }}" class="btn-continuar">Continuar</a>

    </div>
</div>

