<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('nombres*') }}
                    {{ Form::text('nombrePersonas', !empty($persona->nombrePersonas) ? $persona->nombrePersonas : '', ['class' => 'form-control' . ($errors->has('nombrePersonas') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombrePersonas', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('apellidos*') }}
                    {{ Form::text('apellidoPersonas', !empty($persona->apellidoPersonas) ? $persona->apellidoPersonas : '', ['class' => 'form-control' . ($errors->has('apellidoPersonas') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                    {!! $errors->first('apellidoPersonas', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('DUI*') }}
                    {{ Form::text('dui', $persona->dui, ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'DUI', 'id' => 'dui']) }}
                    {!! $errors->first('dui', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('telefono*') }}
                    {{ Form::text('telefono', !empty($persona->telefono) ? $persona->telefono : '', ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono', 'id' => 'telef']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('fecha de nacimiento*') }}
                            <div class="input-group date">
                                {{ Form::text('fechaDeNacimiento', !empty($persona->fechaDeNacimiento) ? $persona->fechaDeNacimiento : '', ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento', 'id' => 'inputFechaDeNacimiento']) }}
                                <div class="input-group-addon input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                            {!! $errors->first('fechaNacimiento', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
                <script type="text/javascript">
                    $(function() {
                        $("#inputFechaDeNacimiento").datetimepicker({
                            format: 'YYYY-MM-DD',
                            maxDate: new Date()
                        })
                    })
                </script>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('NIT*') }}
                    {{ Form::text('nitPersona', $persona->nitPersona, ['class' => 'form-control' . ($errors->has('nitPersona') ? ' is-invalid' : ''), 'placeholder' => 'NIT', 'id' => 'nitPersona']) }}
                    {!! $errors->first('nitPersona', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Sexo*') }}
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            {{ Form::radio('sexo_id', 1, !empty($persona->sexo_id) && $persona->sexo->id == 1 ? true : false, ['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'value' => '1']) }}
                            <span class="selectgroup-button">Hombre</span>
                        </label>
                        <label class="selectgroup-item">
                            {{ Form::radio('sexo_id', 2, !empty($persona->sexo_id) && $persona->sexo->id == 2 ? true : false, ['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'value' => '2']) }}
                            <span class="selectgroup-button">Mujer</span>
                        </label>
                    </div>
                    {!! $errors->first('sexo_id', '<div class="invalid-feedback"><p>message</p></div>') !!}
                </div>
            </div>
             
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('rol*') }}
                    {{ Form::select('rolpersona_id', $roles, $persona->rolpersona_id, ['class' => 'form-control' . ($errors->has('rolpersona_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                    {!! $errors->first('rolpersona_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[id='nitPersona']").mask('0000-000000-000-0');
        $("input[id='telef']").mask('0000-0000');
        $("input[id='dui']").mask('00000000-0');
    });
</script>


