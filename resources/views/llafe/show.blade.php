@extends('layouts.app')

@section('template_title')
    {{ $llafe->name ?? __('Show') . " " . __('Llafe') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Llafe</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('llaves.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Propietario Fk:</strong>
                                    {{ $llafe->Id_Propietario_fk }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo:</strong>
                                    {{ $llafe->Tipo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor:</strong>
                                    {{ $llafe->Valor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
