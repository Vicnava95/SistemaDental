@extends('Base.base')

<!-- Titulo del head de la pagina-->
@section('tituloPagnia')
Doctor General
@endsection

@section('extraJS')
<script src="js/master.js"></script>
@stop

@section('extraCSS')
<link href="css/master.css" rel="stylesheet" type="text/css"/>
@stop

<!-- Titulo para el cuerpo de la pagina web-->
@section('titulo')
Doctor General
@endsection

<!-- descripcion para el cuerpo de la pagina web-->
@section('descripcion')
<h1>Todo el contenido</h1>
@endsection

@section('cuerpo')
<a href="{{route('admin')}}" class="btn btn-light active" role="button" aria-pressed="true">Admin</a>
<a href="{{route('doctorGeneral')}}" class="btn btn-light active" role="button" aria-pressed="true">Doctor General</a>
<a href="{{route('doctoraDental')}}" class="btn btn-light active" role="button" aria-pressed="true">Doctora Dental</a>
<a href="{{route('secretaria')}}" class="btn btn-light active" role="button" aria-pressed="true">Secretaria</a>
<a href="{{route('usuarios.index')}}" class="btn btn-light active" role="button" aria-pressed="true">Usuarios</a>
<a href="{{route('pacientes.index')}}" class="btn btn-light active" role="button" aria-pressed="true">Pacientes</a>
@stop
