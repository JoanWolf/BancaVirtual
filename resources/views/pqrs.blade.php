<link rel="stylesheet" href="{{ asset('css/pqrs.css') }}">

<div class="pqrs-container">
    <h1>PQRS</h1>

    <div class="pqrs-card">
        <form id="pqrs-form" method="POST" action="{{ route('pqrs.store') }}">
            @csrf

            <div class="form-group">
                <label for="tipo">Tipo de PQRS</label>
                <select id="tipo" name="Estado" required>
                    <option value="queja">Queja</option>
                    <option value="reclamo">Reclamo</option>
                    <option value="peticion">Petición</option>
                    <option value="sugerencia">Sugerencia</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" id="asunto" name="Asunto" placeholder="Asunto" required>
            </div>

            <div class="form-group">
                <textarea id="descripcion" name="Descripcion" placeholder="Descripción" required></textarea>
            </div>

            <button type="submit" class="btn-enviar">Enviar</button>
        </form>
    </div>
</div>
