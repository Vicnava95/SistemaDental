@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
RECETAS DENTALES
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Recetas Dentales
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')

@endsection

@section('cuerpo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Recetas Dentales
                            </span>

                            <div class="flex-fill bd-highlight ml-5">
                                <form action="{{ route('rDentales.index') }}" method="GET" class="d-flex">
                                    <input class="form-control" type="text" placeholder="codigo de receta, codigo de consulta o nombre de paciente"
                                        name="texto" aria-label="default input" autocomplete='off'>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                            </div>

                             {{-- <div class="float-right ml-5">
                                <a class="btn btn-primary float-right text-white" data-placement="left" data-toggle="modal" id="mediumButton"
                                    data-target="#mediumModal" data-attr="{{ route('rDentales.create') }}" title="Create a project">
                                    Registrar receta
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
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
										{{-- <th>Proxima Cita</th> --}}
										<th>Estado</th>
                                        <th>Doctora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recetasDentales as $recetasDentale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            @foreach ($expedientes as $expediente)
                                                @if ($expediente->id == $recetasDentale->expedienteDental_id)
                                                    @foreach ($pacientes as $paciente)
                                                        @if ($expediente->paciente_id == $paciente->id)
                                                            <td>{{ $paciente->nombres}}{{$paciente->apellidos}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
											<td>{{ $recetasDentale->descripcion }}</td>
											<td>{{ $recetasDentale->fecha }}</td>
											{{-- <td>{{ $recetasDentale->proximaCita }}</td> --}}
											<td>{{ $recetasDentale->estadoReceta->nombre  }}</td>
                                            <td>Sandra Coto</td>
                                            <td>
                                                <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                data-target="#mediumModal" data-attr="{{ route('rDentales.show',$recetasDentale->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                {{-- <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{ route('rDentales.edit',$recetasDentale->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a> --}}
                                                <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                    data-target="#mediumModal" data-attr="{{route('rDentales.delete',$recetasDentale)}}">
                                                    <i class="fas fa-window-close"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $recetasDentales->links() !!}
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
                    <a data-toggle="modal" id="nuevo" href="#myModal2" data-attr="{{ route('rDentales.edit',$recetasDentale->id) }}">
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
                var b = document.getElementById('exampleModalLongTitle');

                if (letra != 'e') {
                    document.getElementById('registrar').style.display = 'none';
                }

                if (letra != 't') {
                    document.getElementById('editar').style.display = 'none';
                }

                if (letra != 'r') {
                    document.getElementById('eliminar').style.display = 'none';
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
                        b.innerHTML = "Registrar receta dental (Nueva Versión)";
                        break;
                }
            }
    </script>
@endsection
