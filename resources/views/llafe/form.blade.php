<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id__propietario_fk" class="form-label">{{ __('Id Propietario Fk') }}</label>
            <input type="text" name="Id_Propietario_fk" class="form-control @error('Id_Propietario_fk') is-invalid @enderror" value="{{ old('Id_Propietario_fk', $llafe?->Id_Propietario_fk) }}" id="id__propietario_fk" placeholder="Id Propietario Fk">
            {!! $errors->first('Id_Propietario_fk', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
            <input type="text" name="Tipo" class="form-control @error('Tipo') is-invalid @enderror" value="{{ old('Tipo', $llafe?->Tipo) }}" id="tipo" placeholder="Tipo">
            {!! $errors->first('Tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor" class="form-label">{{ __('Valor') }}</label>
            <input type="text" name="Valor" class="form-control @error('Valor') is-invalid @enderror" value="{{ old('Valor', $llafe?->Valor) }}" id="valor" placeholder="Valor">
            {!! $errors->first('Valor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>