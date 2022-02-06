@extends('Base.base')

@section('tituloPagnia')
    Tratamientos
@endsection

@section('titulo')
<a href="{{route('showExpediente',$paciente->id)}}"><i class="fas fa-chevron-circle-left"></i></a>    
    <br>
    Tratamientos Dentales
    <a class="btn btn-secondary float-right text-white"  href="{{route('reportePacienteTratamiento',[$paciente,'ReporteTratamiento']) }}" >Reporte de Tratamientos</a>
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
<h2 class="text">Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h2>
<div class="card">
        <div class=" p-4 mb-4">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Número</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Descripción</th>
                                {{-- <th scope="col">Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($arrayTratamiento as $aTratamiento)
                            @if ($aTratamiento['idDiente'] != 0)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    @foreach ($dientes as $diente)
                                        @if ($aTratamiento['idDiente'] == $diente->id)
                                        <td>{{$diente->nombreDiente}}</td>    
                                        <td>{{$diente->numeroDiente}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$aTratamiento['fecha']}}</td>
                                    <td>{{$aTratamiento['descripcion']}}</td>
                                    {{-- <td>
                                        <a class="btn btn-sm btn-secondary btn-circle btn-circle-sm m-1" id="mediumButton" 
                                            data-toggle="modal"  href="#" role="button" data-target="#editTratamiento{{$aTratamiento['idDiente']}}"           >
                                                <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger btn-circle btn-circle-sm m-1" id="mediumButton2" 
                                        data-toggle="modal"  href="#" role="button" data-target="#deleteTratamiento{{$aTratamiento['idDiente']}}" >
                                                <i class="fa fa-fw fa-trash"></i>
                                        </a>
                                    </td> --}}
                                </tr>

                                <!-- Modal EDIT -->
                                <div class="modal fade" id="editTratamiento{{$aTratamiento['idDiente']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Tratamiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="formCreate" action="{{route('updateTramientoDiente',$aTratamiento['idTratamiento'])}}"  role="form" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Descripción</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3">{{$aTratamiento['descripcion']}}</textarea>
                                                </div> 
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" form="formCreate" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteTratamiento{{$aTratamiento['idDiente']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            @include('DoctoraDental.deleteTratamiento',array('id'=>$aTratamiento['idTratamiento'], 'descripcion'=>$aTratamiento['descripcion']))
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection