@extends('Base.base')

@section('tituloPagnia')
    Editar Tratamiento
@endsection

@section('titulo')
    <a href="{{route('ExpedientePacienteDoctoraDental',$expedienteDental[0]->id)}}"><i class="fas fa-chevron-circle-left"></i></a>    
    <br>
    Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}
    <br>
    Doctora: Sandra Coto
    <br>
    Número de diente: {{$idTratamiento->diente->numeroDiente}}
    <br>
    Diente: {{$idTratamiento->diente->nombreDiente}}
@endsection

@section('descripcion')
    
@endsection

@section('cuerpo')
<form method="post" id="formUpdateTratamiento" action="{{route('updateTratamiento',[$idTratamiento,$expedienteDental[0]->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="exampleFormControlTextarea2">Descripción</label>
        <textarea class="form-control" id="exampleFormControlTextarea2" name="descripcion" rows="3" required>{{$idTratamiento->descripcion}}</textarea>
    </div>
        
    <button type="submit" form="formUpdateTratamiento" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection

