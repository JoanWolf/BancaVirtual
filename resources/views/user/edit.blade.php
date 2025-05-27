
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@if (Auth::user()->Rol == "admin" )
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                {{-- <div class="card card-default"> --}}
                    {{-- <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User</span>
                    </div> --}}

                <h1 class="config-title"
                    style="margin-top: 2%; font-size: 28px; color: #333; margin-left: 15.2%; margin-bottom:1.8% ;">Editar usuario</h1>
                    
                <div class="card-body bg-white"
                    style="

    width: 150%;
    max-width: 800px;
    height: 500px;
    padding: 40px;
    margin-left: 15.3%;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
@endif
