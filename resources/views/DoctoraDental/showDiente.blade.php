
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header text-center">
                    <span class="card-title">Diente número: {{$diente->numeroDiente}}</span>
                    <br>
                    <span class="card-title">Nombre: {{$diente->nombreDiente}}</span>
                </div>
                <div class="card-body">
                    @if (!$tratamientos->isEmpty())
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tratamientos as $tratamiento)
                                            <tr>
                                                <th scope="row">{{$n++}}</th>
                                                <td>{{$tratamiento->fecha}}</td>
                                                <td>{{$tratamiento->descripcion}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
  
  
</section>


