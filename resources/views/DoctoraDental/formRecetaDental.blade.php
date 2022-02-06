<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Fecha receta') }}
                    <br>
                    <label for=""> {{$cita->fecha}}</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Descripción') }}
                    {{ Form::textarea('descripcion', $recetasDentale->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción', 'rows' => 5]) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Proxima Cita') }}
                    <div class="input-group date">
                        {{ Form::text('proximaCita', $recetasDentale->proximaCita, ['class' => 'form-control' . ($errors->has('proximaCita') ? ' is-invalid' : ''), 'placeholder' => 'Proxima Cita' , 'id' => 'proximaCita']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#proximaCita').datetimepicker({
                            minDate: new Date(),
                            format: 'YYYY-MM-DD',
                        });
                    });
                </script>
            </div>
        </div>
        <div>
            <input name="expedienteDental_id" id="" value="{{$expedienteId}}" hidden>
            <input name="estadoReceta_id" value="1" hidden>
            <input name="fecha" value="{{$cita->fecha}}" id="fecha" hidden >
            <input name="idCita" value="{{$cita->id}}"  hidden >
        </div>

    </div>
</div>