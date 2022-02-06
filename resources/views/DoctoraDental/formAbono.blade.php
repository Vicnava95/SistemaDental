<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $abono->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
</div>