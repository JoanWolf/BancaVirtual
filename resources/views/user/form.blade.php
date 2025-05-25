<link href="{{ asset('css/form.css') }}" rel="stylesheet">

<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-6 form-group mb-3">
                <label for="nombre" class="form-label">{{ __('') }}</label>
                <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror" required
                    value="{{ old('Nombre', $user?->Nombre) }}" id="nombre" placeholder="Nombre">
                {!! $errors->first('Nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="apellido" class="form-label">{{ __('') }}</label>
                <input type="text" name="Apellido" class="form-control @error('Apellido') is-invalid @enderror" required
                    value="{{ old('Apellido', $user?->Apellido) }}" id="apellido" placeholder="Apellido">
                {!! $errors->first('Apellido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="fecha__nacimiento" class="form-label">{{ __('') }}</label>
                <input type="date" name="Fecha_Nacimiento"
                    class="form-control @error('Fecha_Nacimiento') is-invalid @enderror"
                    value="{{ old('Fecha_Nacimiento', $user?->Fecha_Nacimiento) }}" id="fecha__nacimiento"
                    placeholder="Fecha Nacimiento" max="{{ \Carbon\Carbon::now()->subYears(13)->format('Y-m-d') }}"
                    required>
                {!! $errors->first(
                    'Fecha_Nacimiento',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="tipo__documento" class="form-label">{{ __('') }}</label>
                <select name="Tipo_Documento" id="tipo__documento"
                    class="form-control @error('Tipo_Documento') is-invalid @enderror" required>
                    <option value="" disabled
                        {{ old('Tipo_Documento', $user?->Tipo_Documento) ? '' : 'selected' }}
                        class="placeholder-option">
                        Tipo de documento
                    </option>
                    <option value="DNI"
                        {{ old('Tipo_Documento', $user?->Tipo_Documento) === 'DNI' ? 'selected' : '' }}>DNI</option>
                    <option value="PAS"
                        {{ old('Tipo_Documento', $user?->Tipo_Documento) === 'PAS' ? 'selected' : '' }}>Pasaporte
                    </option>
                    <option value="CC"
                        {{ old('Tipo_Documento', $user?->Tipo_Documento) === 'CC' ? 'selected' : '' }}>Cédula</option>
                </select>
                {!! $errors->first(
                    'Tipo_Documento',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="n__documento" class="form-label">{{ __('') }}</label>
                <input type="text" name="N_Documento" class="form-control @error('N_Documento') is-invalid @enderror"
                    value="{{ old('N_Documento', $user?->N_Documento) }}" id="n__documento" placeholder="N Documento">
                {!! $errors->first('N_Documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="telefono" class="form-label">{{ __('') }}</label>
                <input type="text" name="Telefono" class="form-control @error('Telefono') is-invalid @enderror" required
                    value="{{ old('Telefono', $user?->Telefono) }}" id="telefono" placeholder="Telefono">
                {!! $errors->first('Telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="rol" class="form-label">{{ __('') }}</label>
                <select name="Rol" id="rol" class="form-control @error('Rol') is-invalid @enderror" required>
                    <option value="" disabled
                        {{ old('Rol', $user?->Rol) === null || old('Rol', $user?->Rol) === '' ? 'selected' : '' }}>
                        Ninguno</option>
                    <option value="admin" {{ old('Rol', $user?->Rol) === 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="user" {{ old('Rol', $user?->Rol) === 'user' ? 'selected' : '' }}>user</option>
                </select>
                {!! $errors->first('Rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>








            <div class="col-md-6 form-group mb-3">
                <label for="email" class="form-label">{{ __('') }}</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required
                    value="{{ old('email', $user?->email) }}" id="email" placeholder="Correo electrónico">

                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="password" class="form-label">{{ __('') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                    value="{{ old('password') }}" id="password" placeholder="Contraseña">

                {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>

    <div class="button-group">
        <button type="submit" class="btn-enviar">{{ __('Enviar') }}</button>
        <a href="{{ url('/users') }}" class="btn-cancel">Cancelar</a>
    </div>


</div>
