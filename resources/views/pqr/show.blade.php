@extends('layouts.app')

@section('template_title')
    {{ $pqr->name ?? __('Show') . " " . __('Pqr') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pqr</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pqrs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Asunto:</strong>
                                    {{ $pqr->Asunto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Envio:</strong>
                                    {{ $pqr->Fecha_Envio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $pqr->Estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $pqr->Descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Respuesta:</strong>
                                    {{ $pqr->Respuesta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisor Fk:</strong>
                                    {{ $pqr->Emisor_fk }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Receptor Fk:</strong>
                                    {{ $pqr->Receptor_fk }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
