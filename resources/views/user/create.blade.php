<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@if (Auth::user()->Rol == 'admin')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- <div class="card card-default"> --}}
                {{-- <div class="card-header">
                        <span class="card-title">{{ __('Create') }} User</span>
                    </div> --}}
                <h1 class="config-title"
                    style="
        margin-top: 3.5%;
        font-size: 28px;
        color: #333;
        margin-bottom: 1.8%;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        text-align: left;">
                    Crear usuario
                </h1>


                <div class="card-body bg-white"
                    style="
                            width: 150%;
                            max-width: 800px;
                            height: 500px;
                            padding: 40px;
                            margin: 0 auto;
                            border-radius: 10px;
                            background-color: #ffffff;
                            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                            box-sizing: border-box;">




                    <form method="POST" action="{{ route('users.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        @include('user.form')

                    </form>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
@endif
