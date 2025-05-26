{{--@section('content')--}}

<!-- Enlace al CSS personalizado -->
<link rel="stylesheet" href="{{ asset('css/configuracion.css') }}">
@if($errors->has('confirmacion'))
<div class="alert alert-warning" style="background-color: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #ffeeba;">
    <strong>¡Advertencia!</strong><br>
    {{ $errors->first('confirmacion') }}

    <form method="POST" action="{{ route('config.update') }}" style="margin-top: 10px;">
        @csrf
        @method('PUT')
        <input type="hidden" name="Telefono" value="{{ old('Telefono') }}">
        <input type="hidden" name="email" value="{{ old('email') }}">
        <input type="hidden" name="password" value="{{ old('password') }}">
        <input type="hidden" name="confirmado" value="1">

        <button type="submit" class="btn btn-warning" style="margin-right: 10px;">Sí, actualizar de todos modos</button>
        <a href="{{ route('configuracion') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endif

<!-- Formulario de registro -->
{{--<form method="POST" action="{{ route('register') }}">
@csrf--}}

<h1 class="config-title">Configuración</h1>

<form method="POST" action="{{ route('config.update') }}">
    @csrf
    @method('PUT')
    <div class="form-inner">
        <div class="form-row">
            <input type="text" name="Telefono" id="telefono" value="{{ auth()->user()->Telefono }}" required>
            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>
        </div>
        <div class="form-row">
            <input type="password" name="password" id="password" placeholder="Nueva contraseña (opcional)">
        </div>
        <div class="form-buttons">
            <button type="submit" class="btn-submit">Guardar cambios</button>
        </div>
    </div>
</form>


{{--<div class="form-inner">

            <!-- Nombres y Apellidos -->
            {{--<div class="form-row">
                    <!-- <input type="text" name="Nombre" placeholder="Nombre" value="{{ old('Nombre') }}" id="nombre" required> -->
<input type="text" name="Nombre" class="@error('Nombre') is-invalid @enderror" value="{{ old('Nombre') }}" id="nombre" placeholder="Nombre" required>
{!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
<!-- <input type="text" name="Apellido" placeholder="Apellido" value="{{ old('Apellido') }}" id="apellido"
                        required> -->
<input type="text" name="Apellido" class="@error('Apellido') is-invalid @enderror" value="{{ old('Apellido') }}" id="apellido" placeholder="Apellido">
{!! $errors->first('Apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

</div>

<!-- Tipo de documento y número -->
<div class="form-row">
    <select name="Tipo_Documento" id="tipo__documento" required>
        <option value="" disabled selected>Tipo de documento</option>
        <option value="DNI">DNI</option>
        <option value="PAS">Pasaporte</option>
        <option value="CC">Cedula</option>
    </select>
    {!! $errors->first('Tipo_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

    <!-- <input type="text" name="N_Documento" placeholder="Nº de documento" -->
    <!-- value="{{ old('N_Documento') }}" id="n__documento" required> -->
    <input type="text" name="N_Documento" class="@error('N_Documento') is-invalid @enderror" value="{{ old('N_Documento') }}" id="n__documento" placeholder="N Documento" required>
    {!! $errors->first('N_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
</div>--}}

<!-- Fecha de nacimiento y teléfono -->
{{--<div class="form-row">
                    <!-- <input type="date" name="fecha_nacimiento" required> -->


                    <input
                        type="date"
                        name="Fecha_Nacimiento"
                        class="form-control @error('Fecha_Nacimiento') is-invalid @enderror"
                        value="{{ old('Fecha_Nacimiento') }}"
id="fecha__nacimiento"
placeholder="Fecha Nacimiento"
max="{{ \Carbon\Carbon::now()->subYears(13)->format('Y-m-d') }}" {{-- Limita selección a mayores de 13
                        required>
                    {!! $errors->first('Fecha_Nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

                    <div class="phone-group">
                        <select name="cod_pais" required>
                            <option value="0">0</option>
                            <option value="57">+57</option>
                            <option value="2">+2</option>
                            <!-- Agrega más códigos si deseas -->
                        </select>
                        <!-- <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}"
required> -->

</div>
</div>
<br>
<!-- Correo -->
<!-- Correo -->
<div class="form-row">
    <input type="text" name="Telefono" class=" @error('Telefono') is-invalid @enderror" value="{{ old('Telefono') }}" id="telefono" placeholder="Telefono" required>
    {!! $errors->first('Telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    <!-- <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" id="Email" required> -->
    <input type="text" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Email" required>
    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
</div>


<!-- Contraseñas -->
<div class="form-row">
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" placeholder="password">
    {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="password confirmation">
    {!! $errors->first('password_confirmation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    <!-- <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required> -->
</div>

<!-- Botones -->
<div class="form-buttons">
    <button type="submit" class="btn-submit">Enviar</button>
    <a href="{{ route('login') }}" class="btn-cancel">Cancelar</a>
</div>

</div>--}}

{{--</form>--}}
{{--@endsection--}}
