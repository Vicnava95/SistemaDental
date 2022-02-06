<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6" hidden>
                <div class="form-group" >
                    {{ Form::label('expediente_doctora_dental') }}
                    {{ Form::text('expediente_doctora_dental_id', $pago->expediente_doctora_dental_id, ['class' => 'form-control' . ($errors->has('expediente_doctora_dental_id') ? ' is-invalid' : ''), 'placeholder' => 'Expediente Doctora Dental']) }}
                    {!! $errors->first('expediente_doctora_dental_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('costo') }}
                    {{ Form::text('costo', $pago->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
                    {!! $errors->first('costo', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', $pago->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                        <script type="text/javascript">
                            $(function () {
                                var hoy = new Date();
                                hoy.setDate(hoy.getDate() - 1);
                                $("#inputFecha").datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    minDate: hoy
                                });
                            });
                        </script>
                </div>
            </div>
            {{-- <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('estado_pago') }}
                    {{ Form::select('estado_pago_id', $estadosPago,$pago->estado_pago_id, ['class' => 'form-control' . ($errors->has('estado_pago_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado de pago']) }}
                    {!! $errors->first('estado_pago_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div> --}}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textArea('descripcion', $pago->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'4']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>            
    </div>
</div>