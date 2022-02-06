@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
CITAS
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Listado de Citas

<a class="btn btn-secondary float-right text-white"  href="{{route('citas.reporteCitas') }}" >Reporte de citas</a>

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
                                {{ __('Cita') }}
                            </span>

                            <div class="flex-fill bd-highlight ml-5">
                                <form action="{{ route('citas.index') }}"
                                    method="GET" class="d-flex">
                                        <input class="form-control" type="text" placeholder="Código o nombre del paciente" name="texto" aria-label="default input"  autocomplete='off'>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                            </div>
                            <div class="float-right ml-5">
                                <a class="btn btn-primary float-right text-white" data-placement="left" data-toggle="modal"
                                    id="mediumButton" data-target="#mediumModal"
                                    data-attr="{{ route('citas.create') }}" title="Create a project">
                                    Registrar citas
                                </a>
                            </div>
                        </div>
                    </div>
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Paciente</th>
                                        <th>Fecha</th>
										<th>Hora</th>
                                        <th>Estado</th>
                                    @if(Auth::user()->rols_fk==1||Auth::user()->rols_fk==4)
                                        <th>Doctor</th>
                                    @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            {{--<td>{{ $cita->paciente_id }}</td>--}}
                                            <td>{{ $cita->Paciente->apellidos }}, {{ $cita->Paciente->nombres }}</td>
											{{--<td>{{ $cita->Persona->apellidoPersonas }}, {{ $cita->Persona->nombrePersonas }}</td> --}}

                                            <td>{{ $cita->fecha }}</td>
                                            <td>{{ $cita->hora }}</td>
                                            <td>{{ $cita->EstadoCita->nombre }}</td>
                                        @if(Auth::user()->rols_fk==1||Auth::user()->rols_fk==4)
                                            <td>{{ $cita->persona->nombrePersonas }} {{ $cita->persona->apellidoPersonas }}</td>
                                        @endif



                                            <td>
                                                <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('citas.show', $cita->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('citas.edit', $cita->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1"
                                                    id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                    data-attr="{{ route('citas.delete', $cita->id) }}">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>

                                                {{--
                                                <form action="{{ route('citas.destroy',$cita->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('citas.show',$cita->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('citas.edit',$cita->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $citas->links() !!}
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
                @foreach ($cita->getAttributes() as $key => $value)
                    @error($key)
                        $("[name='{{$key}}']").addClass('is-invalid').parent().append('<div class="invalid-feedback"><p>{{$message}}</p></div>')
                    @enderror
                    $("[name='{{$key}}']").val('{{ old($key) }}');
                @endforeach
                $("[name='paciente_id_hid']").val("{{old('paciente_id_hid')}}");
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
                    b.innerHTML = "Registrar Cita";
                    break;

                case 't':
                    b.innerHTML = "Editar Cita";
                    break;

                case 'r':
                    b.innerHTML = "Eliminar Cita";
                    break;

                default:
                    b.innerHTML = "Mostrar Cita";
                    break;
            }
        }
    </script>

@endsection
