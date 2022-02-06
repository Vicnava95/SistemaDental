<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="{{(Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2)? 'col-md-6': ''}} col-sm-12">
                <div class="form-group">
                    {{ Form::label($paciente->nombres .' '. $paciente->apellidos) }}
                    <input type="text" class="form-control" value="{{$paciente->id}}" name="paciente_id_hid" hidden>
                </div>
            </div>
            @if ((Auth::user()->rols_fk!=3 && Auth::user()->rols_fk!=2))
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('Doctor*') }}
                        <select class="form-control custom-select custom-select-m bg-dark" style="color:lightgray" name="persona_id">
                            <option>Seleccione una persona</option>
                            @foreach ($personas as $persona)
                                @if ($cita->persona_id == $persona->id)
                                    <option selected value="{{ $persona['id'] }}"> {{ $persona['nombrePersonas'] }}  {{ $persona['apellidoPersonas'] }} </option>
                                @else
                                    <option value="{{ $persona['id'] }}"> {{ $persona['nombrePersonas'] }} {{ $persona['apellidoPersonas'] }} </option>
                                @endif

                            @endforeach
                        </select>

                        {!! $errors->first('persona_id', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Fecha*') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($cita->fecha) ? $cita->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id'=>'inputFecha', 'autocomplete' =>'off']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#inputFecha").datetimepicker({
                            format: 'YYYY-MM-DD'
                        });
                    });
                </script>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Hora*') }}
                    <div class="input-group date">
                        {{ Form::text('hora', $cita->hora, ['id'=>'hora', 'class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                        {!! $errors->first('hora', '<div class="invalid-feedback">:message</p>') !!}
                                <div class="input-group-addon input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#hora").datetimepicker({
                            format: 'HH:mm',
                            stepping: 30
                        });
                    });
                 </script>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Estado de la cita*') }}
                    {{ Form::select('estadoCita_id', $estadocita , $cita->estadoCita_id,['class' => 'form-control' . ($errors->has('estadoCita_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado de la cita']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function searchPaciente(name){
            $.ajax({
                method:'GET',
                url:'searchPaciente/'+ name,
                success:function(data){
                    $('#listaPacientes').fadeIn();
                    $('#listaPacientes').html(data);
                    console.log(data);
                }
            });
    }

    $('#paciente_id_hid').keyup(function(){
        var paciente = $('#paciente_id_hid').val();
        searchPaciente(paciente);

        if (paciente==' ' || paciente == ''){
            $('#listaPacientes').fadeOut();
        }

        console.log(paciente);
    });

    $(document).on('click', 'li', function(){
        $('#paciente_id_hid').val($(this).text());
        $('#listaPacientes').fadeOut();
        var a = this.value;
        console.log(a);
        document.getElementById('paciente_id').innerHTML = 5;
        $("#paciente_id").val(a);
    });

</script>

