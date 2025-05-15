@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('Show') . " " . __('User') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>N Documento:</strong>
                                    {{ $user->N_Documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $user->Nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido:</strong>
                                    {{ $user->Apellido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Nacimiento:</strong>
                                    {{ $user->Fecha_Nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Documento:</strong>
                                    {{ $user->Tipo_Documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $user->Telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rol:</strong>
                                    {{ $user->Rol }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $user->Estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Saldo:</strong>
                                    {{ $user->Saldo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $user->email }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
