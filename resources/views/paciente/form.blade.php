<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('nombres*') }}
                    {{ Form::text('nombres', !empty($paciente->nombres) ? $paciente->nombres : '', ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('nombres', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('apellidos*') }}
                    {{ Form::text('apellidos', !empty($paciente->apellidos) ? $paciente->apellidos : '', ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
                    {!! $errors->first('apellidos', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('DUI') }}
                    {{ Form::text('dui', !empty($paciente->dui) ? $paciente->dui : '', ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => '########-#']) }}
                    {!! $errors->first('dui', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('ocupación') }}
                    {{ Form::text('ocupacion', !empty($paciente->ocupacion) ? $paciente->ocupacion : '', ['class' => 'form-control' . ($errors->has('ocupacion') ? ' is-invalid' : ''), 'placeholder' => 'Ocupación']) }}
                    {!! $errors->first('ocupacion', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('teléfono de casa') }}
                    {{ Form::text('telefonoCasa', !empty($paciente->telefonoCasa) ? $paciente->telefonoCasa : '', ['class' => 'form-control' . ($errors->has('telefonoCasa') ? ' is-invalid' : ''), 'placeholder' => '####-####']) }}
                    {!! $errors->first('telefonoCasa', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('teléfono celular*') }}
                    {{ Form::text('telefonoCelular', !empty($paciente->telefonoCelular) ? $paciente->telefonoCelular : '', ['class' => 'form-control' . ($errors->has('telefonoCelular') ? ' is-invalid' : ''), 'placeholder' => '####-####']) }}
                    {!! $errors->first('telefonoCelular', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('fecha de nacimiento*') }}
                    <div class="input-group date">
                        {{ Form::text('fechaDeNacimiento', $paciente->fechaDeNacimiento, ['class' => 'form-control' . ($errors->has('fechaDeNacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento', 'id' => 'inputFechaDeNacimiento' , 'autocomplete' => 'off']) }}
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
                    {{ Form::label('Sexo*') }}
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            {{ Form::radio('sexo_id', 1, !empty($paciente->sexo_id) && $paciente->sexo->id == 1 ? true : false, ['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'value' => '1']) }}
                            <span class="selectgroup-button">Hombre</span>
                        </label>
                        <label class="selectgroup-item">
                            {{ Form::radio('sexo_id', 2, !empty($paciente->sexo_id) && $paciente->sexo->id == 2 ? true : false, ['class' => 'selectgroup-input' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'value' => '2']) }}
                            <span class="selectgroup-button">Mujer</span>
                        </label>
                    </div>
                    {!! $errors->first('sexo_id', '<div class="invalid-feedback"><p>message</p></div>') !!}
                </div>
            </div>
            <!--
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    
                    
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('dirección*') }}
                    {{ Form::text('direccion', !empty($paciente->direccion) ? $paciente->direccion : '', ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('correo electrónico') }}
                    {{ Form::text('correoElectronico', !empty($paciente->correoElectronico) ? $paciente->correoElectronico : '', ['class' => 'form-control' . ($errors->has('correoElectronico') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico']) }}
                    {!! $errors->first('correoElectronico', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('referencia personal') }}
                    {{ Form::text('referenciaPersonal', !empty($paciente->referenciaPersonal) ? $paciente->referenciaPersonal : '', ['class' => 'form-control' . ($errors->has('referenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => 'Referencia personal']) }}
                    {!! $errors->first('referenciaPersonal', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('teléfono de referencia personal') }}
                    {{ Form::text('telReferenciaPersonal', !empty($paciente->telReferenciaPersonal) ? $paciente->telReferenciaPersonal : '', ['class' => 'form-control' . ($errors->has('telReferenciaPersonal') ? ' is-invalid' : ''), 'placeholder' => '####-####']) }}
                    {!! $errors->first('telReferenciaPersonal', '<div class="invalid-feedback"><p>:message</p></div>') !!}
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='telReferenciaPersonal']").mask('0000-0000');
        $("input[name='telefonoCelular']").mask('0000-0000');
        $("input[name='telefonoCasa']").mask('0000-0000');
        $("input[name='dui']").mask('00000000-0');
    });
</script>
