

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Users') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <form method="GET" action="{{ route('users') }}">
                    <div>
                        <label for="estado">Estado:</label>
                        <select name="estado" id="estado">
                            <option value="">Todos</option>
                            <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div>
                        <label for="tipo_documento">Tipo de Documento:</label>
                        <select name="tipo_documento" id="tipo_documento">
                            <option value="">Todos</option>
                            <option value="CC" {{ request('tipo_documento') === 'CC' ? 'selected' : '' }}>CC</option>
                            <option value="TI" {{ request('tipo_documento') === 'TI' ? 'selected' : '' }}>TI</option>
                            <option value="CE" {{ request('tipo_documento') === 'CE' ? 'selected' : '' }}>CE</option>
                            <!-- Agrega más si los necesitas -->
                        </select>
                    </div>

                    <button type="submit">Filtrar</button>
                </form>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>N Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Tipo Documento</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Saldo</th>
                                    <th>Email</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $user->N_Documento }}</td>
                                    <td>{{ $user->Nombre }}</td>
                                    <td>{{ $user->Apellido }}</td>
                                    <td>{{ $user->Fecha_Nacimiento }}</td>
                                    <td>{{ $user->Tipo_Documento }}</td>
                                    <td>{{ $user->Telefono }}</td>
                                    <td>{{ $user->Rol }}</td>
                                    <td>{{ $user->Estado }}</td>
                                    <td>{{ $user->Saldo }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('users.show', $user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $users->withQueryString()->links() !!}
        </div>
    </div>
</div>

