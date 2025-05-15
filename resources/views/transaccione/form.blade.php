<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="llave_fk" class="form-label">{{ __('Llave Fk') }}</label>
            <input type="text" name="llave_fk" class="form-control @error('llave_fk') is-invalid @enderror" value="{{ old('llave_fk', $transaccione?->llave_fk) }}" id="llave_fk" placeholder="Llave Fk">
            {!! $errors->first('llave_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha__envio" class="form-label">{{ __('Fecha Envio') }}</label>
            <input type="text" name="Fecha_Envio" class="form-control @error('Fecha_Envio') is-invalid @enderror" value="{{ old('Fecha_Envio', $transaccione?->Fecha_Envio) }}" id="fecha__envio" placeholder="Fecha Envio">
            {!! $errors->first('Fecha_Envio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="text" name="Monto" class="form-control @error('Monto') is-invalid @enderror" value="{{ old('Monto', $transaccione?->Monto) }}" id="monto" placeholder="Monto">
            {!! $errors->first('Monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="referencia" class="form-label">{{ __('Referencia') }}</label>
            <input type="text" name="Referencia" class="form-control @error('Referencia') is-invalid @enderror" value="{{ old('Referencia', $transaccione?->Referencia) }}" id="referencia" placeholder="Referencia">
            {!! $errors->first('Referencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
            <input type="text" name="Tipo" class="form-control @error('Tipo') is-invalid @enderror" value="{{ old('Tipo', $transaccione?->Tipo) }}" id="tipo" placeholder="Tipo">
            {!! $errors->first('Tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="Estado" class="form-control @error('Estado') is-invalid @enderror" value="{{ old('Estado', $transaccione?->Estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('Estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="emisor_fk" class="form-label">{{ __('Emisor Fk') }}</label>
            <input type="text" name="Emisor_fk" class="form-control @error('Emisor_fk') is-invalid @enderror" value="{{ old('Emisor_fk', $transaccione?->Emisor_fk) }}" id="emisor_fk" placeholder="Emisor Fk">
            {!! $errors->first('Emisor_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="receptor_fk" class="form-label">{{ __('Receptor Fk') }}</label>
            <input type="text" name="Receptor_fk" class="form-control @error('Receptor_fk') is-invalid @enderror" value="{{ old('Receptor_fk', $transaccione?->Receptor_fk) }}" id="receptor_fk" placeholder="Receptor Fk">
            {!! $errors->first('Receptor_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>