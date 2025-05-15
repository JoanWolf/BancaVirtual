@extends('layouts.app')

@section('template_title')
    {{ $transaccione->name ?? __('Show') . " " . __('Transaccione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Transaccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('transacciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Llave Fk:</strong>
                                    {{ $transaccione->llave_fk }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Envio:</strong>
                                    {{ $transaccione->Fecha_Envio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monto:</strong>
                                    {{ $transaccione->Monto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Referencia:</strong>
                                    {{ $transaccione->Referencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo:</strong>
                                    {{ $transaccione->Tipo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $transaccione->Estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisor Fk:</strong>
                                    {{ $transaccione->Emisor_fk }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Receptor Fk:</strong>
                                    {{ $transaccione->Receptor_fk }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
