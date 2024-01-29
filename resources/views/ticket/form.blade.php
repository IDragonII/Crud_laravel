
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_cliente') }}</label>
    <div>
        {{ Form::text('nombre_cliente', $ticket->nombre_cliente, ['class' => 'form-control' .
        ($errors->has('nombre_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Cliente']) }}
        {!! $errors->first('nombre_cliente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">ticket <b>nombre_cliente</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo') }}</label>
    <div>
        {{ Form::text('tipo', $ticket->tipo, ['class' => 'form-control' .
        ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
        {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">ticket <b>tipo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('problema') }}</label>
    <div>
        {{ Form::text('problema', $ticket->problema, ['class' => 'form-control' .
        ($errors->has('problema') ? ' is-invalid' : ''), 'placeholder' => 'Problema']) }}
        {!! $errors->first('problema', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">ticket <b>problema</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $ticket->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">ticket <b>descripcion</b> instruction.</small>
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
