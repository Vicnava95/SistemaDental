<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-sm-12" hidden>
                <div class="form-group">
                    {{ Form::label('Consulta*') }}
                    {{ Form::text('consulta_id', $receta->consulta_id, ['class' => 'form-control' . ($errors->has('consulta_id') ? ' is-invalid' : ''), 'placeholder' => 'Consulta Id']) }}
                    {!! $errors->first('consulta_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Fecha receta*') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($receta->fecha) ? $receta->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id' => 'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    {{ Form::label('Proxima Cita') }}
                    <div class="input-group date">
                        {{ Form::text('proximaCita', !empty($receta->proximaCita) ? $receta->proximaCita: '', ['class' => 'form-control' . ($errors->has('proximaCita') ? ' is-invalid' : ''), 'placeholder' =>  'Proximacita', 'id' => 'inputFecha2']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('proximaCita', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#inputFecha').datetimepicker({
                            format: 'YYYY-MM-DD',
                        });
                        $('#inputFecha2').datetimepicker({
                            useCurrent: false,
                            format: 'YYYY-MM-DD', //Important! See issue #1075
                    });
                        $("#inputFecha").on("dp.change", function (e) {
                            $('#inputFecha2').data("DateTimePicker").minDate(e.date);
                        });
                        $("#inputFecha2").on("dp.change", function (e) {
                            //$('#inputFecha').data("DateTimePicker").minDate(e.date);
                        });
                    });
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('Descripcion*') }}
                    {{ Form::textarea('descripcion', $receta->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows'=>'6']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        {{--@if (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)--}}
            <!-- <div class="{{ (Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)? 'col-md-6' : 'col-md-4' }} col-12"> 
                <div class="form-group" id="estado">
                    {{ Form::label('Estado*') }}
                       <select class="form-control custom-select custom-select-m bg-dark" style="color:lightgray" name="persona_id">
                         <option  >Seleccione estado</option>
                         @foreach ($estadoRecetas as $estado)
                            @if ($receta->estadoReceta_id == $estado->id)
                                <option selected value="{{ $estado['id'] }}"> {{ $estado['nombre'] }} </option>
                                @else
                                <option  value="{{ $estado['id'] }}"> {{ $estado['nombre'] }}</option>
                            @endif
                         @endforeach
                        </select>
                     
                     {!! $errors->first('estadoReceta_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
             </div> -->
        {{--@endif--}}
    </div>
    {{--<div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>--}}
</div>
