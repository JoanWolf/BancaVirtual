


<link rel="stylesheet" href="{{ asset('css/admin-pqrs.css') }}">

<div class="container pqrs-container">
    <h2 class="title">PQRs</h2>

    <div class="card pqrs-card">
        <div class="pqrs-header">
            <div class="search-group">
                <input type="text" class="form-control" placeholder="🔍 Buscar">
                <button class="btn btn-primary">Buscar</button>
            </div>

            <div class="date-filters">
                <div>
                    <label>Desde</label>
                    <input type="date" class="form-control">
                </div>
                <div>
                    <label>Hasta</label>
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>P</td>
                        <td>Usuario1</td>
                        <td>16/4/2025</td>
                        <td>Pendiente</td>
                        <td><a href="{{ route('pqrs.responder', 1) }}" class="btn btn-responder">Responder</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

