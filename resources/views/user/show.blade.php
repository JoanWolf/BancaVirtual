<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12" style="margin-top: 5%;">
            {{-- <div class="card" style="margin-top: 3.5%;"> --}}
                {{-- <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;"> --}}
                    {{-- <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} usuario</span>
                        </div> --}}


                    <div class="card-body bg-white" style="
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 40px;
                        height: auto;
                        border-radius: 10px;
                        background-color: #ffffff;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                        box-sizing: border-box;">


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
                            
                            <br>
                            <div class="float-right" style="margin-top: 5%">
                                <a class="btn btn-danger btn-sm" href="{{ route('users') }}"> {{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>

                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</section>
