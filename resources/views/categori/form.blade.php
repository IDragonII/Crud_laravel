
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $categori->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categori <b>nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo') }}</label>
    <div>
        {{ Form::text('tipo', $categori->tipo, ['class' => 'form-control' .
        ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
        {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categori <b>tipo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('stock') }}</label>
    <div>
        {{ Form::text('stock', $categori->stock, ['class' => 'form-control' .
        ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
        {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categori <b>stock</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>