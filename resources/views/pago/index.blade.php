@extends("Base.base")

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
PAGOS
@endsection

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Listado de pagos
<a class="btn btn-secondary float-right text-white"  href="{{route('pago.reportePagos') }}" >Reporte de Pagos</a>
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
                                {{ __('Pago') }}
                            </span>

                             <div class="float-right">
                                
                              </div>
                        </div>
                    </div>
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

                                @if ($message = Session::get('error'))
                                    <img class='w-25 mx-auto mb-3 d-block' src="{{asset('assets/img/error.svg')}}"/>
                                    <p class="text-white text-center">{{ $message }}</p>
                                    <script type="text/javascript">
                                        $('#modalSuccess').modal('show');
                                        setTimeout(function(){
                                            $('#modalSuccess').modal('hide')
                                        }, 8000);
                                    </script>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Descripcion</th>
										<th>Costo</th>
                                        <th>Abono</th>
                                        <th>Restante</th>
										<th>Fecha</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $pago->descripcion }}</td>
											<td>${{ $pago->costo }}</td>
                                            <td>${{ $pago->abono }}</td>
                                            <td>${{ $pago->costo - $pago->abono }}</td>
											<td>{{ $pago->fecha }}</td>
											<td>{{ $pago->EstadoPago->nombre }}</td>

                                            <td>
                                                <a class="btn btn-secondary btn-sm btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('pagos.show', $pago->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1"
                                                        id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                        data-attr="{{ route('pagos.edit', $pago->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1"
                                                    id="mediumButton" data-toggle="modal" data-target="#mediumModal"
                                                    data-attr="{{route('pagos.delete', $pago->id)}}">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton2" data-toggle="modal"
                                                        data-target="#mediumModal2"
                                                        href="#" role="button"                                      data-attr="{{ route('showAbonosExpedienteDental', $pago->id) }}"
                                                        >
                                                        <i class="fas fa-list-alt"></i>
                                                </a>
                                                <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" data-toggle="modal"
                                                        data-target="#mediumModal"
                                                        href="#" role="button" data-abono="abono" data-attr="{{ route('createAbonoExpedienteDental',['idPaciente'=>$pago->expediente_doctora_dental_id,'idPago' => $pago->id]) }}"
                                                        >
                                                        <i class="fas fa-hand-holding-usd"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pagos->links() !!}
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

    <!-- Modal mostrar lista de abono -->
    <div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Editar abono
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody2">
                    <div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Editar Abono -->
    <div class="modal fade" id="mediumModal3" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Editar abono
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody3">
                    <div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formEdit" class="btn btn-primary" id="editar">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if (count($errors) > 0)
            let href=localStorage.getItem('formulario');
                console.log('{{$errors}}')
                @if ($errors->has('monto'))
                    mostrarModal3(href)
                @else
                    mostrarModal(href)
                @endif

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
            let abono = $(this).attr('data-abono');
            mostrarModal(href,abono)
            localStorage.setItem('formulario', href);
        });

        $(document).on('click', '#mediumButton2', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            mostrarModal2(href)
            localStorage.setItem('formulario', href);
        });

        $(document).on('click', '#mediumButton3', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            mostrarModal3(href)
            localStorage.setItem('formulario', href);
        });


        function mostrarModal(href, abono) {
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

            if (abono != 'abono') {
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
                    b.innerHTML = "Registrar Pago";
                    break;

                case 't':
                    b.innerHTML = "Editar Pago";
                    break;

                case 'r':
                    b.innerHTML = "Eliminar Pago";
                    break;

                default:
                    b.innerHTML = "Mostrar Pago";
                    break;
            }
        }

        function mostrarModal2(href) {
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal2').modal("show");
                    $('#mediumBody2').html(result).show();
                    $('#mediumModal').modal("hide");

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
        }

        function mostrarModal3(href) {
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal3').modal("show");
                    $('#mediumBody3').html(result).show();
                    $('#mediumModal2').modal("hide");

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
        }

    </script>

@endsection
