
<link rel="stylesheet" href="{{ asset('css/pqrs.css') }}">

<div class="pqrs-container">
    <h1>PQRS</h1>

    <div class="pqrs-card">
        <div class="form-group">
            <label for="tipo">Tipo de PQRS</label>
            <select id="tipo" name="tipo">
                <option value="queja">Queja</option>
                <option value="reclamo">Reclamo</option>
                <option value="peticion">Petición</option>
                <option value="sugerencia">Sugerencia</option>
            </select>
        </div>

        <div class="form-group">
            {{-- <label for="asunto">Asunto</label> --}}
            <input type="text" id="asunto" name="asunto" placeholder="Asunto">
        </div>

        <div class="form-group">
            {{-- <label for="descripcion">Descripción</label> --}}
            <textarea id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
        </div>

        <button class="btn-enviar" disabled>Enviar</button>
    </div>
</div>

