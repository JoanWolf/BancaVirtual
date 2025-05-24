
<link rel="stylesheet" href="{{ asset('css/llaves-registradas.css') }}">

<div class="llaves-registradas-container">

    <h1>Llaves</h1>

    <div class="llaves-card">
        <div class="card-header">
            <h2>Llaves Registradas</h2>
            <a href="{{ route('registro-llaves') }}" class="btn-volver">Volver</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="llaves-list">
            @forelse($llaves as $llave)
                <li class="llave-item" id="llave-{{ $llave->id }}">
                    <span class="llave-valor">{{ $llave->Valor }}</span>

                    <button class="btn-copiar" data-valor="{{ $llave->Valor }}" title="Copiar llave">📋</button>

                    <form action="{{ route('llaves.destroy', $llave->id) }}" method="POST" class="form-eliminar-llave" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar esta llave?')">🗑️</button>
                    </form>
                </li>
            @empty
                <li>No tienes llaves registradas.</li>
            @endforelse
        </ul>
    </div>
</div>

<script>
document.querySelectorAll('.btn-copiar').forEach(button => {
    button.addEventListener('click', () => {
        const valor = button.getAttribute('data-valor');
        navigator.clipboard.writeText(valor).then(() => {
            alert('Llave copiada al portapapeles: ' + valor);
        }).catch(err => {
            alert('Error al copiar la llave.');
        });
    });
});
</script>
