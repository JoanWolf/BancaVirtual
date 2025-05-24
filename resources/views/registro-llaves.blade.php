
<link rel="stylesheet" href="{{ asset('css/registro-llaves.css') }}">

<div class="registro-llaves-container">

    <h1>Llaves</h1>

    <div class="llaves-card">
        <a href="{{ route('llaves-registradas') }}" class="titulo">Gestión y Consultar Llaves</a>


        <div class="llaves-lista">
            <div class="llave-item">
                <span class="etiqueta">Llave del banco</span>
                <span class="valor">@bandi12345</span>
                <input type="checkbox" class="llave-checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">C.C.</span>
                <span class="valor">74185296</span>
                <input type="checkbox" class="llave-checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">Número de celular</span>
                <span class="valor">3108647925</span>
                <input type="checkbox" class="llave-checkbox">
            </div>
            <div class="llave-item">
                <span class="etiqueta">Correo electrónico</span>
                <span class="valor">Usuario@Dominio.Com</span>
                <input type="checkbox" class="llave-checkbox">
            </div>
        </div>

        <button class="btn-continuar" id="btn-continuar" disabled>Continuar</button>
    </div>
</div>

<script>
    const checkboxes = document.querySelectorAll('.llave-checkbox');
    const btnContinuar = document.getElementById('btn-continuar');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                checkboxes.forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });
                btnContinuar.disabled = false;
                btnContinuar.classList.add('activo');
            } else {
                // Si ninguno queda seleccionado, deshabilitar el botón
                const algunoMarcado = Array.from(checkboxes).some(cb => cb.checked);
                if (!algunoMarcado) {
                    btnContinuar.disabled = true;
                    btnContinuar.classList.remove('activo');
                }
            }
        });
    });
</script>


