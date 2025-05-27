<link rel="stylesheet" href="{{ asset('css/transacciones.css') }}">
<div class="container-all">
    <h1>Transacciones</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">



                            {{-- <div class="float-right">
                                <a href="{{ route('transacciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="GET" action="{{ route('transacciones') }}">
                        <label for="desde">Desde:</label>
                        <input type="date" name="desde" value="{{ request('desde') }}">

                        <label for="hasta">Hasta:</label>
                        <input type="date" name="hasta" value="{{ request('hasta') }}">

                        <label for="estado">Estado:</label>
                        <select name="estado">
                            <option value="">-- Todos --</option>
                            <option value="Exitosa" {{ request('estado') == 'Exitosa' ? 'selected' : '' }}>Exitosa
                            </option>
                            <option value="Pendiente" {{ request('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente
                            </option>
                            <option value="Fallida" {{ request('estado') == 'Fallida' ? 'selected' : '' }}>Fallida
                            </option>
                            <option value="Revertida" {{ request('estado') == 'Revertida' ? 'selected' : '' }}>Revertida
                            </option>
                        </select>

                        <button type="submit">Filtrar</button>
                        <a href="{{ route('transacciones') }}">Limpiar</a>
                    </form>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Llave Fk</th>
                                        <th>Fecha Envio</th>
                                        <th>Monto</th>
                                        {{-- <th>Referencia</th> --}}
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Emisor Fk</th>
                                        <th>Receptor Fk</th>

                                        
                                    
                                <tbody>
                                    @foreach ($transacciones as $transaccione)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $transaccione->llave_fk }}</td>
                                            <td>{{ $transaccione->Fecha_Envio }}</td>
                                            <td>{{ $transaccione->Monto }}</td>
                                            {{-- <td>{{ $transaccione->Referencia }}</td> --}}
                                            <td>{{ $transaccione->Tipo }}</td>
                                            <td>{{ $transaccione->Estado }}</td>
                                            <td>{{ $transaccione->Emisor_fk }}</td>
                                            <td>{{ $transaccione->Receptor_fk }}</td>

                                            {{-- <td>
                                                <form action="{{ route('transacciones.destroy', $transaccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transacciones.show', $transaccione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('transacciones.edit', $transaccione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $transacciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
</div>
