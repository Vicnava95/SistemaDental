@extends('Base.base')

@section('tituloPagnia')
Expediente {{$paciente->nombres}}
@endsection

@section('titulo')
<a href="{{route('dshDoctorGeneral.index')}}"><i class="fas fa-chevron-circle-left"></i></a>
<br>
Expediente Clínico de: {{$paciente->nombres}} {{$paciente->apellidos}}
@endsection

@section('descripcion')

@endsection

@section('cuerpo')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 col-12 d-flex justify-content-center align-items-center">

                <div class="container">

                    <div class="text-center">
                        <h2>{{$citaPaciente->fecha}}</h2>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                            <a class="btn btn-primary disabled" id="mediumButton" href="#" role="button"
                                data-toggle="modal" data-target="#mediumModal"
                                data-attr="{{ route('citas.create') }}" hidden>Tratamientos</a>
                        </div>
                        <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                            <a class="btn btn-primary" id="mediumButton" href="#" role="button" data-toggle="modal"
                                data-target="#mediumModal"
                                data-attr="{{ route('crearCitaDoctor',$citaPaciente->paciente_id) }}">Crear Cita</a>
                        </div>

                        <div class="form-group col-md-3 col-3 d-flex justify-content-center align-items-end">
                            <a class="btn btn-primary float-right text-white" target="_blank" href="{{ route('reporteDiagnosticoGeneral', $expedientePaciente->id) }}">Reporte de diagnostico general</a>
                        </div>

                        
                        
                        <div class="form-group col-md-3 col-12 d-flex justify-content-center align-items-end">
                            <a class="btn btn-primary disabled" id="mediumButton" href="#" role="button"
                                data-toggle="modal" data-target="#mediumModal"
                                data-attr="{{ route('citas.create') }}" hidden>Pagos</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <h2 class="text">Información personal</h2>
    <div class="card">
        <div class="container">

            <div class="row">
                <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end" style="margin-top:10px;">
                    <label class="text-center">Nombre: {{$paciente->nombres}}</label>
                </div>
                <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                    <label class="text-center">Apellido: {{$paciente->apellidos}}</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                    <label class="text-center">Celular: {{$paciente->telefonoCelular}}</label>
                </div>
                <div class="form-group col-md-3 col-12 d-flex justify-content align-items-end">
                    <label class="text-center">Fecha de nacimiento: {{$paciente->fechaDeNacimiento}}</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
                    <label class="text-center">Dirección: {{$paciente->direccion}}</label>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text">Detalles de la consulta (Actual)</h2>
    {{-- Formulario para crear una consulta --}}
    <form method="POST" action="{{route('crearConsulta')}}">
        @csrf
        <div class="card">
            <div class="container">

                <!--Nuevos campos-->
                <h3 align="center">Fecha de consulta: {{ $citaPaciente->fecha }}</h3>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Peso del paciente:</label>
                            {{ Form::text('peso', !empty($consulta->peso) ? $consulta->peso: '' ,['class'
                            =>'form-control' .
                            ($errors->has('peso') ? 'is_invalid' : ''), 'placeholder' => '000.00 Kg', 'maxlength' =>
                            '6', 'minlength'=>'2']) }}
                            {!! $errors->first('peso', '<div class="invalid-feedback">
                                <p>:message</p>
                            </div>') !!}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Estatura del paciente:</label>
                            {{ Form::text('estatura', !empty($consulta->estatura) ? $consulta->estatura: '' ,['class'
                            =>'form-control' .
                            ($errors->has('estatura') ? 'is_invalid' : ''), 'placeholder' => '0.00 m']) }}
                            {!! $errors->first('estatura', '<div class="invalid-feedback">
                                <p>:message</p>
                            </div>') !!}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Presion del paciente:</label>
                            {{ Form::text('presion', !empty($consulta->presion) ? $consulta->presion: '' ,['class'
                            =>'form-control' .
                            ($errors->has('presion') ? 'is_invalid' : ''), 'placeholder' => '000/000 mmHg']) }}
                            {!! $errors->first('presion', '<div class="invalid-feedback">
                                <p>:message</p>
                            </div>') !!}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Temperatura del paciente:</label>
                            {{ Form::text('temperatura', !empty($consulta->temperatura) ? $consulta->temperatura: ''
                            ,['class'
                            =>'form-control' .
                            ($errors->has('temperatura') ? 'is_invalid' : ''), 'placeholder' => ' 00.0 ºC']) }}
                            {!! $errors->first('temperatura', '<div class="invalid-feedback">
                                <p>:message</p>
                            </div>') !!}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Frecuencia cardiaca del paciente:</label>
                            {{ Form::number('frecuencia_cardiaca', !empty($consulta->frecuencia_cardiaca) ?
                            $consulta->frecuencia_cardiaca: '' ,['class' =>'form-control' .
                            ($errors->has('frecuencia_cardiaca') ? 'is_invalid' : ''), 'placeholder' => '000 latidos/minuto',
                            'maxlength' => '3', 'minlength'=>'1']) }}
                            {!! $errors->first('temperatura', '<div class="invalid-feedback">
                                <p>:message</p>
                            </div>') !!}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="text">Frecuencia respiratoria del paciente:</label>
                            {{ Form::number('frecuencia_respiratoria', !empty($consulta->frecuencia_respiratoria) ?
                            $consulta->frecuencia_respiratoria: '' ,['class' =>'form-control' .
                            ($errors->has('frecuencia_respiratoria') ? 'is_invalid' : ''), 'placeholder' => '000 respiraciones/minuto',
                            'maxlength' => '3', 'minlength'=>'1']) }}
                            <h6 style="color: gray" align="right">solo digitar cantidad</h6>
                        </div>
                    </div>
                </div>
                <!--Termina nuevos campos-->

                <br>
                <label class="text">Detalle:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required
                    name="descripcionConsulta" maxlength="250"></textarea>
                <br>
                <label class="text">Examenes solicitados:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="solicitud_examen"
                    maxlength="250" placeholder="Listado de examnes solicitados"></textarea>

            </div>
            <div class="row container">
                <input type="text" name="idPaciente" value="{{$citaPaciente->paciente_id}}" hidden>
                <input type="text" name="idPersona" value="{{$citaPaciente->persona_id}}" hidden>
                <input type="text" name="fechaConsulta" value="{{$citaPaciente->fecha}}" hidden>
                <input type="text" name="idCita" value="{{$citaPaciente->id}}" hidden>
                <button class="btn btn-primary" type="submit" style="margin:15px;">Crear consulta</button>
            </div>
        </div>
    </form>

    <h2 class="text">Detalle de las consultas</h2>
    <div class="card">
        <div class="form-group col-md-4 col-12 d-flex justify-content align-items-end" style="margin-top:10px;">
            <label class="text-center">Cantidad de citas: {{$cantidadConsultas}}</label>
        </div>
        @if ($cantidadConsultas == 0)
        <div class=" p-4 mb-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>No hay consultas registradas</h3>
                </div>
            </div>
        </div>
        @else
        <div class=" p-4 mb-4">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Frecuencia cardiaca</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Receta</th>
                                <th scope="col">Examenes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collecionConsultas as $collecionConsulta)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{$collecionConsulta['fecha']}}</td>
                                <td>{{ $collecionConsulta['peso'] }} Kg</td>
                                <td>{{ $collecionConsulta['frecuencia_cardiaca'] }} latidos/minuto</td>
                                <td>{{$collecionConsulta['descripcion']}}</td>
                                <td>
                                    <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton"
                                        data-toggle="modal" data-target="#mediumModal"
                                        data-attr="{{ route('crearRecetaExpedienteGeneral',$collecionConsulta['id']) }}">
                                        <i class="fas fa-receipt"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton"
                                        data-toggle="modal" data-target="#mediumModal"
                                        data-attr="{{ route('crearExamenExpedienteGeneral',$collecionConsulta['id']) }}">
                                        <i class="fas fa-file-medical-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>




<!-- Modal Registrar/Editar/Eliminar -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <---Titulo--->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" form="formCreate" class="btn btn-primary" id="registrar">Registrar</button>
                <!--<button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Eliminar</button> -->
            </div>
        </div>
    </div>
</div>

<!-- modal de mensaje correto-->
@if ($message = Session::get('success'))
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-body py-5">
                @if ($message = Session::get('success'))
                <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/check.svg')}}" />
                <p class="text-white text-center">{{ $message }}</p>
                <script type="text/javascript">
                    $('#modalSuccess').modal('show');
                            setTimeout(function(){
                                $('#modalSuccess').modal('hide')
                            }, 5000);
                </script>
                @endif
            </div>
        </div>
    </div>
</div>
@endif


<script>
    @if (count($errors) > 0)

            let href=localStorage.getItem('formulario');
            mostrarModal(href)
                setTimeout(function(){
                @foreach ($errors->getMessages() as $key => $value)
                    @error($key)
                        $("[name='{{$key}}']").addClass('is-invalid').parent().append('<div class="invalid-feedback"><p>{{$message}}</p></div>')
                    @enderror
                    $("[name='{{$key}}']").val('{{ old($key) }}');
                @endforeach
            },500);
        @endif



        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            mostrarModal(href)
            localStorage.setItem('formulario', href);
        });

        function mostrarModal(href) {
            /*document.getElementById('registrar').style.display = 'block';
            document.getElementById('editar').style.display = 'block';
            document.getElementById('eliminar').style.display = 'block';*/
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 0

            })

            var letra = href.charAt(href.length - 1);
            var b = document.getElementById('exampleModalLongTitle').innerHTML = "Registrar";
        }

        //mascaras para campos de consulta
        $(document).ready(function(){
        $("input[name='presion']").mask('000/000');
        $("input[name='temperatura']").mask('00.0');
        $("input[name='estatura']").mask('0.00');
        $("input[name='peso']").mask('000.00');
        //$("input[name='frecuencia_respiratoria']").mask('000');
        //$("input[name='frecuencia_cardiaca']").mask('000');


        });
</script>
@endsection
