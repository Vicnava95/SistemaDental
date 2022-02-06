<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Nombre*') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Email*') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Contraseña*') }}
                    {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Rol*') }}
                    {{ Form::select('rols_fk', $roles , $user->rols_fk,['class' => 'form-control' . ($errors->has('rols_fk') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un rol']) }}
                    {!! $errors->first('rols_fk', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
