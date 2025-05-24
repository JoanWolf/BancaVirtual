<link rel="stylesheet" href="{{ asset('css/registro-llaves.css') }}">

<div class="registro-llaves-container">
    <h1>Llaves</h1>

    <div class="llaves-card">
        <a href="{{ route('llaves-registradas') }}" class="titulo">Gestion y Consultar Llaves</a>

        <form method="POST" action="{{ route('llaves.guardarDesdeFormulario') }}">
            @csrf
            <div class="llaves-lista">
                @foreach ($llavesDisponibles as $llave)
                    <div class="llave-item">
                        <span class="etiqueta">{{ $llave['tipo'] }}</span>
                        <span class="valor">{{ $llave['valor'] }}</span>
                        <input type="radio" name="llave_seleccionada" value="{{ $llave['tipo'] }}|{{ $llave['valor'] }}" class="llave-checkbox">
                    </div>
                @endforeach
            </div>

            <button class="btn-continuar" id="btn-continuar" disabled>Continuar</button>
        </form>
    </div>
</div>

<script>
    const radios = document.querySelectorAll('.llave-checkbox');
    const btnContinuar = document.getElementById('btn-continuar');

    radios.forEach((radio) => {
        radio.addEventListener('change', function () {
            btnContinuar.disabled = false;
            btnContinuar.classList.add('activo');
        });
    });
</script>
