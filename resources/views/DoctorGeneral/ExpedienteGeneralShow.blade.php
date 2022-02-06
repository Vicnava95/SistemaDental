@extends('Base.base')

@section('tituloPagnia')
    Expediente {{$paciente->nombres}}
@endsection

@section('titulo')
    <a href="{{route('expedientesGeneral')}}"><i class="fas fa-chevron-circle-left"></i></a>
    <br>
    Expediente Clínico de: {{$paciente->nombres}} {{$paciente->apellidos}}


        <a class="btn btn-secondary float-right text-white" target="_blank" href="{{ route('reporteDiagnosticoGeneral', $expedientePaciente->id) }}">Reporte de diagnostico general</a>
    
@endsection

@section('descripcion')

@endsection

@section('cuerpo')
    <div class="card-body" >
        <h2 class="text">Información personal</h2>
        <div class="card">
            <div class="container">

                <div class="row" style="margin-top:10px;">
                    <div class="form-group col-md-6 col-12 d-flex justify-content align-items-end">
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
                                        <th scope="col">Recetas</th>
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
        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-body py-5">
                    @if ($message = Session::get('success'))
                        <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/check.svg')}}"/>
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
    </script>
@endsection
