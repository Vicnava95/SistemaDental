@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
PACIENTES
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Listado de Pacientes
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
                        <div class="d-flex justify-content-start align-items-center">
                            <span id="card_title">
                                {{ __('Paciente') }}
                            </span>
                            <div class="flex-fill bd-highlight ml-5">
                                <form action="{{ route('pacientes.index') }}"
                                    method="GET" class="d-flex">
                                        <input class="form-control" type="text" placeholder="Nombre, apellido o ID" name="texto" aria-label="default input"  autocomplete='off'>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                            </div>
                            <div class="float-right ml-5">
                                <a class="btn btn-primary float-right text-white" data-placement="left" data-toggle="modal"
                                    id="mediumButton" data-target="#mediumModal"
                                    data-attr="{{ route('pacientes.create') }}" title="Create a project">
                                    Registrar paciente
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success') || count($errors) > 0)
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        {{-- <th>Dui</th> --}}
                                        <th>Teléfono casa</th>
                                        <th>Teléfono celular</th>
                                        {{-- <th>Fechadenacimiento</th>
										<th>Direccion</th>
										<th>Referenciapersonal</th>
										<th>Telreferenciapersonal</th>
										<th>Ocupacion</th>
										<th>Correoelectronico</th>
										<th>Sexo</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $paciente->nombres }}</td>
                                            <td>{{ $paciente->apellidos }}</td>
                                            {{-- <td>{{ $paciente->dui }}</td> --}}
                                            <td>{{ $paciente->telefonoCasa }}</td>
                                            <td>{{ $paciente->telefonoCelular }}</td>
                                            {{-- <td>{{ $paciente->fechaDeNacimiento }}</td>
											<td>{{ $paciente->direccion }}</td>
											<td>{{ $paciente->referenciaPersonal }}</td>
											<td>{{ $paciente->telReferenciaPersonal }}</td>
											<td>{{ $paciente->ocupacion }}</td>
											<td>{{ $paciente->correoElectronico }}</td>
											<td>{{ $paciente->sexo->nombre }}</td> --}}

                                            <td>

                                                    <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('pacientes.show', $paciente->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('pacientes.edit', $paciente->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>

                                                    {{-- <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        href="{{ route("pacientes.show", $paciente->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a> --}}

                                                    <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('pacientes.delete', $paciente->id) }}">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                    </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pacientes->links() !!}
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
                    <button type="submit" form="formDelete" class="btn btn-danger" id="eliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <script>

        @if (count($errors) > 0)
            let href=localStorage.getItem('formulario');
            mostrarModal(href)
            setTimeout(function(){


                @foreach ($paciente->getAttributes() as $key => $value)
                    @error($key)
                        @if ($key == 'sexo_id')
                            $("[name='{{$key}}']").addClass('is-invalid').parent().parent().parent().append('<div class="invalid-feedback d-block"><p>{{$message}}</p></div>')
                        @else
                            $("[name='{{$key}}']").addClass('is-invalid').parent().append('<div class="invalid-feedback"><p>{{$message}}</p></div>')
                        @endif
                    @enderror

                    @if ($key == 'sexo_id')
                        @if (old($key)==1)
                            $("[name='{{$key}}'][value=1]").attr('checked', true)
                        @endif
                        @if (old($key)==2)
                            $("[name='{{$key}}'][value=2]").attr('checked', true)
                        @endif
                    @else
                        $("[name='{{$key}}']").val('{{ old($key) }}')
                    @endif
                @endforeach
            },500)
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
                b.innerHTML = "Registrar paciente";
                break;

                case 't':
                b.innerHTML = "Editar paciente";
                break;

                case 'r':
                b.innerHTML = "Eliminar paciente";
                break;

                default:
                b.innerHTML = "Mostrar paciente";
                break;
            }
        }
    </script>

@endsection
