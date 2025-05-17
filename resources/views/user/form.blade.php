<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="n__documento" class="form-label">{{ __('N Documento') }}</label>
            <input type="text" name="N_Documento" class="form-control @error('N_Documento') is-invalid @enderror" value="{{ old('N_Documento', $user?->N_Documento) }}" id="n__documento" placeholder="N Documento">
            {!! $errors->first('N_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old('Nombre', $user?->Nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="Apellido" class="form-control @error('Apellido') is-invalid @enderror" value="{{ old('Apellido', $user?->Apellido) }}" id="apellido" placeholder="Apellido">
            {!! $errors->first('Apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha__nacimiento" class="form-label">{{ __('Fecha Nacimiento') }}</label>
            <input
                type="date"
                name="Fecha_Nacimiento"
                class="form-control @error('Fecha_Nacimiento') is-invalid @enderror"
                value="{{ old('Fecha_Nacimiento', $user?->Fecha_Nacimiento) }}"
                id="fecha__nacimiento"
                placeholder="Fecha Nacimiento"
                max="{{ \Carbon\Carbon::now()->subYears(13)->format('Y-m-d') }}" {{-- Limita selección a mayores de 13 --}}
                required>
            {!! $errors->first('Fecha_Nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tipo__documento" class="form-label">{{ __('Tipo Documento') }}</label>
            <input type="text" name="Tipo_Documento" class="form-control @error('Tipo_Documento') is-invalid @enderror" value="{{ old('Tipo_Documento', $user?->Tipo_Documento) }}" id="tipo__documento" placeholder="Tipo Documento">
            {!! $errors->first('Tipo_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="Telefono" class="form-control @error('Telefono') is-invalid @enderror" value="{{ old('Telefono', $user?->Telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('Telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="Rol" class="form-control @error('Rol') is-invalid @enderror" value="{{ old('Rol', $user?->Rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('Rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="Estado" class="form-control @error('Estado') is-invalid @enderror" value="{{ old('Estado', $user?->Estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('Estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldo" class="form-label">{{ __('Saldo') }}</label>
            <input type="text" name="Saldo" class="form-control @error('Saldo') is-invalid @enderror" value="{{ old('Saldo', $user?->Saldo) }}" id="saldo" placeholder="Saldo">
            {!! $errors->first('Saldo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('password') }}</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $user?->password) }}" id="password" placeholder="password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
