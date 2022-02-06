<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre Rol') }}
            {{ Form::text('nombreRolPersona', $rolpersona->nombreRolPersona, ['class' => 'form-control' . ($errors->has('nombreRolPersona') ? ' is-invalid' : ''), 'placeholder' => 'Nombre rol']) }}
            {!! $errors->first('nombreRolPersona', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
   <!-- <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Sbmit</button>
    </div> -->
</div>