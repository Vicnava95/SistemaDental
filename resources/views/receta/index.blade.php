@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
RECETAS MEDICAS
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Recetas Médicas
<a class="btn btn-secondary float-right text-white"  href="{{route('recetas.reporteRecetas') }}" >Reporte de Recetas</a>
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')

@endsection

<!-- Agregar contenido de la pagina web-->
@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Receta') }}
                            </span>

                            <div class="flex-fill bd-highlight ml-5">
                                <form action="{{ route('recetas.index') }}"
                                    method="GET" class="d-flex">
                                        <input class="form-control" type="text" placeholder="codigo de receta, codigo de consulta o nombre de paciente" name="texto" aria-label="default input" autocomplete= 'off'>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                            </div>
                           <!--  @if(!(Auth::user()->rols_fk==4 || Auth::user()->rols_fk==1))
                           <div class="float-right ml-5">
                                <a class="btn btn-primary float-right text-white" data-placement="left" data-toggle="modal" id="mediumButton"
                                    data-target="#mediumModal" data-attr="{{ route('recetas.create') }}" title="Create a project">
                                    Registrar receta
                                </a>
                            </div>
                            @endif -->
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-dark">
                                    <div class="modal-body py-5">
                                        @if($message = Session::get('success'))
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Paciente</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <!--
                                        <th>Consulta</th>
                                        -->
                                        <th>Doctor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recetas as $receta)
                                    @if ($receta->estadoReceta_id != 2)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $receta->Consulta->Paciente->apellidos }}, {{ $receta->Consulta->Paciente->nombres }}</td>
                                            <td>{{ $receta->fecha }}</td>
                                            <td>{{ $receta->descripcion }}</td>
                                            <!--
                                            <td>
                                                <a href="#" class="link-primary" id="mediumButton" data-toggle="modal"
                                                data-target="#mediumModal" data-attr="{{ route('consultas.show', $receta->Consulta->Paciente->id) }}">
                                                    {!! Str::words($receta->Consulta->descripcion, 6, ' ...') !!}
                                                </a>
                                            </td>
                                            -->
                                            <td>{{ $receta->estadoReceta->nombre }}</td>
                                            <td>{{ $receta->Consulta->Persona->nombrePersonas }}{{ $receta->Consulta->Persona->apellidoPersonas }}</td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('recetas.show', $receta->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                {{-- <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('recetas.edit', $receta->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a> --}}
                                                <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('recetas.delete', $receta->id) }}">
                                                    <i class="fas fa-window-close"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recetas->links() !!}
            </div>
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
                    <button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Anular</button>
                    <a data-toggle="modal" id="nuevo" href="#myModal2" data-attr="{{ route('recetas.edit', $receta->id) }}">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal:nth-of-type(even) {
            z-index: 1052 !important;
        }
    </style>

    <!--- Modal nueva version --->
    <div class="modal fade" id="myModal2" data-backdrop="static">
	<div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle2">
                <---Titulo--->
            </h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container"></div>
            <div class="modal-body" id="mediumBody2">
                <div>
                        <!-- the result to be displayed apply here -->
                        NUEVA VERSIÓN
                        
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" form="formEdit" class="btn btn-primary" id="editar">Registrar</button>
        </div>
      </div>
    </div>
</div>

    <script>
        @if (count($errors) > 0)
                let href=localStorage.getItem('formulario');
                mostrarModal(href)
                    setTimeout(function(){
                    @foreach ($receta->getAttributes() as $key => $value)
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
                document.getElementById('registrar').style.display = 'block';
                document.getElementById('editar').style.display = 'block';
                document.getElementById('eliminar').style.display = 'block';
                document.getElementById('nuevo').style.display = 'block';
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
                        alert("Pagina " + href + " no se puede abrir. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 0

                })

                var letra = href.charAt(href.length - 1);
                var b = document.getElementById('exampleModalLongTitle');

                if (letra != 'e') {
                    document.getElementById('registrar').style.display = 'none';
                }

                if (letra != 't') {
                    document.getElementById('editar').style.display = 'none';
                }

                if (letra != 'r') {
                    document.getElementById('eliminar').style.display = 'none';
                    document.getElementById('nuevo').style.display = 'none';
                }

                switch (letra) {
                    case 'e':
                        b.innerHTML = "Registrar receta";
                        break;

                    case 't':
                        b.innerHTML = "Editar receta";
                        break;

                    case 'r':
                        b.innerHTML = "Anular receta";

                        var eliminar = document.getElementById("eliminar");
                        var nuevo = document.getElementById("nuevo");
                        var counter = 5;
                        var newElement = document.createElement("p");
                        var newElement2 = document.createElement("p");
                        newElement.innerHTML = "Espere 5 segundos";
                        newElement2.innerHTML = "";
                        var id;

                        eliminar.parentNode.replaceChild(newElement, eliminar);
                        nuevo.parentNode.replaceChild(newElement2, nuevo);

                        id = setInterval(function() {
                            counter--;
                            if(counter < 0) {
                                newElement.parentNode.replaceChild(eliminar, newElement);
                                newElement2.parentNode.replaceChild(nuevo, newElement2);
                                clearInterval(id);
                            } else {
                                newElement.innerHTML = "Espere " + counter.toString() + " segundos.";
                            }
                        }, 1000);


                        break;

                    default:
                        b.innerHTML = "Mostrar receta";
                        break;
                }
            }

            //Para modal de nuevo
            $(document).on('click', '#nuevo', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                mostrarModal2(href);
                //localStorage.setItem('formulario', href);
            });

            function mostrarModal2(href) {
                document.getElementById('nuevo').style.display = 'block';
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#myModal2').modal("show");
                        $('#mediumBody2').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Pagina " + href + " no se puede abrir. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 0

                })

                var letra = href.charAt(href.length - 1);
                var b = document.getElementById('exampleModalLongTitle2');

                if (letra != 't') {
                    document.getElementById('editar').style.display = 'none';
                }

                switch (letra) {
                    case 't':
                        b.innerHTML = "Registrar receta (Nueva Versión)";
                        break;
                }
            }
    </script>

@endsection
