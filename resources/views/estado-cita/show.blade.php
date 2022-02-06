@extends('layouts.app')

@section('template_title')
    {{ $estadoCita->name ?? 'Show Estado Cita' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Estado Cita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estado-citas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadoCita->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
