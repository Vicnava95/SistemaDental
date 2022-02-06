<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $abono->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pago') }}
            {{ Form::text('pago_id', $abono->pago_id, ['class' => 'form-control' . ($errors->has('pago_id') ? ' is-invalid' : ''), 'placeholder' => 'Pago']) }}
            {!! $errors->first('pago_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>