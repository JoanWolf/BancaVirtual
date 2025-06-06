<link rel="stylesheet" href="{{ asset('css/users.css') }}">

@if (Auth::user()->Rol == 'admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            {{-- <span id="card_title">
                            {{ __('Users') }}
                        </span> --}}

                            {{-- <div class="float-right">

                        </div> --}}
                        </div>
                    </div>
                    {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif --}}
                    <form method="GET" action="{{ route('users') }}">
                        <div>
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado">
                                <option value="">Todos</option>
                                <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>Inactivo
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="tipo_documento">Tipo de Documento:</label>
                            <select name="tipo_documento" id="tipo_documento">
                                <option value="">Todos</option>
                                <option value="CC" {{ request('tipo_documento') === 'CC' ? 'selected' : '' }}>CC
                                </option>
                                <option value="TI" {{ request('tipo_documento') === 'TI' ? 'selected' : '' }}>TI
                                </option>
                                <option value="CE" {{ request('tipo_documento') === 'CE' ? 'selected' : '' }}>CE
                                </option>
                                <!-- Agrega más si los necesitas -->
                            </select>
                        </div>

                        <button type="submit">Filtrar</button>

                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                            data-placement="left">
                            {{ __('Crear usuario') }}
                        </a>
                    </form>

                    <div class="card-body bg-white">

                        <div class="table-container">
    <table class="table table-striped table-hover users-table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>F/N</th>
                <th>T/D</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Saldo</th>
                <th>Email</th>
                <th>Acciones</th>
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
                            <div class="action-buttons">
                                <a class="btn btn-sm btn-primary" href="{{ route('users.show', $user->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                <a class="btn btn-sm btn-success" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


                    </div>
                </div>
            </div>
            {!! $users->withQueryString()->links() !!}
        </div>
    </div>
    </div>
@endif
