<div class="container-all">
    <h2>Ver PQRS</h2>
    <div class="container-pqrs">

        <div class="info-grid">
            <div class="info-item">
                <label>Asunto</label>
                <p>Asunto a tratarse</p>
            </div>
            <div class="info-item">
                <label>Fecha de envío</label>
                <p>16/4/2025</p>
            </div>
            <div class="info-item">
                <label>Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Resuelto" selected>Resuelto</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
            </div>
            <div class="info-item">
                <label>Descripción</label>
                <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Do Elusmod Tempor Incididunt Ut Labore
                    Et Dolore Magna Aliqua.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="respuesta">Responder</label>
            <textarea name="respuesta" id="respuesta" rows="4" class="form-control">Lorem Ipsum Dolor Sit Amet...</textarea>
        </div>

        <div class="button-group">
            <a href="#" class="btn btn-primary">Enviar</a>
            <a href="{{ route('admin.pqrs') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/resp-pqrs.css') }}">
