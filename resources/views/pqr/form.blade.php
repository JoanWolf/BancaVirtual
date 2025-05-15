<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="asunto" class="form-label">{{ __('Asunto') }}</label>
            <input type="text" name="Asunto" class="form-control @error('Asunto') is-invalid @enderror" value="{{ old('Asunto', $pqr?->Asunto) }}" id="asunto" placeholder="Asunto">
            {!! $errors->first('Asunto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha__envio" class="form-label">{{ __('Fecha Envio') }}</label>
            <input type="text" name="Fecha_Envio" class="form-control @error('Fecha_Envio') is-invalid @enderror" value="{{ old('Fecha_Envio', $pqr?->Fecha_Envio) }}" id="fecha__envio" placeholder="Fecha Envio">
            {!! $errors->first('Fecha_Envio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="Estado" class="form-control @error('Estado') is-invalid @enderror" value="{{ old('Estado', $pqr?->Estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('Estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="Descripcion" class="form-control @error('Descripcion') is-invalid @enderror" value="{{ old('Descripcion', $pqr?->Descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('Descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="respuesta" class="form-label">{{ __('Respuesta') }}</label>
            <input type="text" name="Respuesta" class="form-control @error('Respuesta') is-invalid @enderror" value="{{ old('Respuesta', $pqr?->Respuesta) }}" id="respuesta" placeholder="Respuesta">
            {!! $errors->first('Respuesta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="emisor_fk" class="form-label">{{ __('Emisor Fk') }}</label>
            <input type="text" name="Emisor_fk" class="form-control @error('Emisor_fk') is-invalid @enderror" value="{{ old('Emisor_fk', $pqr?->Emisor_fk) }}" id="emisor_fk" placeholder="Emisor Fk">
            {!! $errors->first('Emisor_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="receptor_fk" class="form-label">{{ __('Receptor Fk') }}</label>
            <input type="text" name="Receptor_fk" class="form-control @error('Receptor_fk') is-invalid @enderror" value="{{ old('Receptor_fk', $pqr?->Receptor_fk) }}" id="receptor_fk" placeholder="Receptor Fk">
            {!! $errors->first('Receptor_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>