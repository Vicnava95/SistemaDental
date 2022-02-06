@extends('Base.base')

@section('tituloPagnia')
    Recetas de PACIENTE
@endsection

@section('titulo')
    <a href="{{route('ExpedientePacienteDoctoraDental',$idCita)}}"><i class="fas fa-chevron-circle-left"></i></a>    
    <br>
    Recetas de: {{$paciente->nombres}} {{$paciente->apellidos}}
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
    <div class="card-body" >
        <h2 class="text">Registro de Recetas</h2>
        <div class="card">
            <div class=" p-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Próxima Cita</th>
                                    <th scope="col">Estado</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recetas as $receta)
                                    <tr>
                                        <th>{{++$i}}</th>
                                        <th>{{$receta->fecha}}</th>
                                        <td>{{$receta->descripcion}}</td>
                                        <td>{{$receta->proximaCita}}</td>
                                        <td>{{$receta->estadoReceta->nombre  }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .btn-outline-primary{
            padding: 5px;
        }
        .col{
            padding: 0px 15px 15px 15px;
        }
    </style>
@endsection