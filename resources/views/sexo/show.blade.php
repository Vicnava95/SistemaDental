@extends('layouts.app')

@section('template_title')
    {{ $sexo->name ?? 'Show Sexo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sexo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sexos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $sexo->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
