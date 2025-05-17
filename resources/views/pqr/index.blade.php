@extends('layouts.app')

@section('template_title')
    Pqrs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pqrs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pqrs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
<form method="GET" action="{{ route('pqrs.index') }}">
    <div>
        <label for="desde">Desde:</label>
        <input type="date" name="desde" id="desde" value="{{ request('desde') }}">
    </div>

    <div>
        <label for="hasta">Hasta:</label>
        <input type="date" name="hasta" id="hasta" value="{{ request('hasta') }}">
    </div>

    <button type="submit">Filtrar</button>
    <a href="{{ route('pqrs.index') }}">Limpiar</a>
</form>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

									<th >Asunto</th>
									<th >Fecha Envio</th>
									<th >Estado</th>
									<th >Descripcion</th>
									<th >Respuesta</th>
									<th >Emisor Fk</th>
									<th >Receptor Fk</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pqrs as $pqr)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $pqr->Asunto }}</td>
										<td >{{ $pqr->Fecha_Envio }}</td>
										<td >{{ $pqr->Estado }}</td>
										<td >{{ $pqr->Descripcion }}</td>
										<td >{{ $pqr->Respuesta }}</td>
										<td >{{ $pqr->Emisor_fk }}</td>
										<td >{{ $pqr->Receptor_fk }}</td>

                                            <td>
                                                <form action="{{ route('pqrs.destroy', $pqr->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pqrs.show', $pqr->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pqrs.edit', $pqr->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $pqrs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
