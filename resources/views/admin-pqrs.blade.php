<link rel="stylesheet" href="{{ asset('css/admin-pqrs.css') }}">
<div class="container pqrs-container">
    <h1>Administrar PQRS</h1>

    <div class="card pqrs-card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="GET" action="{{ route('admin.pqrs') }}" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="desde" class="form-label">Desde</label>
                <input type="date" id="desde" name="desde" class="form-control" value="{{ request('desde') }}">
            </div>
            <div class="col-md-3">
                <label for="hasta" class="form-label">Hasta</label>
                <input type="date" id="hasta" name="hasta" class="form-control" value="{{ request('hasta') }}">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn-filtrar">Filtrar</button>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <a href="{{ route('admin.pqrs') }}" class="btn-limpiar">Limpiar</a>
            </div>

        </form>
        @if ($pqrs->isEmpty())
            <div class="alert alert-info">
                No hay PQRS pendientes por responder.
            </div>
        @else
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pqrs as $pqr)
                        <tr>
                            <td>{{ $pqr->id }}</td>
                            <td>{{ ucfirst(substr($pqr->Estado, 0, 1)) }}</td>
                            <td>{{ $pqr->user_Emisor->email }}</td>
                            <td>{{ $pqr->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                {{ $pqr->Estado_R ? $pqr->Estado_R : 'Pendiente' }}
                            </td>
                            <td>
                                <a href="{{ route('pqrs.admin.show', ['pqr' => $pqr->id]) }}"
                                    class="btn btn-sm btn-primary">
                                    Responder
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
