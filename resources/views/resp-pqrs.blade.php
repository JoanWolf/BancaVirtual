
<div class="container-all">
    <h2>Ver PQRS</h2>
    <div class="container-pqrs">
        <form action="{{ route('pqrs.admin.responder', $pqr->id) }}" method="POST">
            @csrf

            <div class="info-grid">
                <div class="info-item">
                    <label>Asunto</label>
                    <p>{{ $pqr->Asunto }}</p>
                </div>
                <div class="info-item">
                    <label>Fecha de envío</label>
                    <p>{{ $pqr->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="info-item">
                    <label>Estado</label>
                    <select name="estado" id="estado" class="form-select" required>
                    <option value="Pendiente" {{ $pqr->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Cancelado" {{ $pqr->estado == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="Resuelto" {{ $pqr->estado == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                </select>
                </div>
                <div class="info-item">
                    <label>Descripción</label>
                    <p>{{ $pqr->user_Emisor->Nombre  }} {{ $pqr->user_Emisor->Apellido  }} - {{ $pqr->user_Emisor->Telefono  }}<br/>{{ $pqr->Descripcion  }}</p>
                </div>
            </div>

            <div class="form-group">
                <label for="respuesta">Responder</label>
                <textarea name="respuesta" id="respuesta" rows="4" class="form-control"></textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('admin.pqrs') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/resp-pqrs.css') }}">
