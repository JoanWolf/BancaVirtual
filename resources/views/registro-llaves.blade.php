
<link rel="stylesheet" href="{{ asset('css/registro-llaves.css') }}">

<div class="registro-llaves-container">

    <h1>Llaves</h1>

    <div class="llaves-card">
        <a href="{{ route('llaves-registradas') }}" class="titulo">Gestión y Consultar Llaves</a>


        <div class="llaves-lista">
            <div class="llave-item">
                <span class="etiqueta">Llave del banco</span>
                <span class="valor">@bandi12345</span>
                <input type="checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">C.C.</span>
                <span class="valor">74185296</span>
                <input type="checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">Número de celular</span>
                <span class="valor">3108647925</span>
                <input type="checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">Correo electrónico</span>
                <span class="valor">Usuario@Dominio.Com</span>
                <input type="checkbox">
            </div>
        </div>

        <button class="btn-continuar">Continuar</button>
    </div>
</div>

