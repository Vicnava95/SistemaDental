@extends('layouts.app')

@section('template_title')
    {{ $estadoPago->name ?? 'Show Estado Pago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estadoPago->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
