
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
                    <form method="POST" id="formCreate" action="{{route('storeTratamiento', [$diente->id, $fecha])}}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required></textarea>
                        </div> 
                    </form>
                    @if (!$tratamientos->isEmpty())
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tratamientos as $tratamiento)
                                            <tr>
                                                <th scope="row">{{$n++}}</th>
                                                <td>{{$tratamiento->fecha}}</td>
                                                <td>{{$tratamiento->descripcion}}</td>
                                                <td>
                                                    <a href="{{route('editTratamiento',[$idPaciente, $tratamiento])}}" class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="delete" data-toggle="modal" data-target="#deleteModal{{$tratamiento->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="deleteModal{{$tratamiento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            @include('DoctoraDental.deleteTratamiento',array('id'=>$tratamiento->id, 'descripcion'=>$tratamiento->descripcion))
                                                        </div>
                                                    </div>
                                                </div>
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


