
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Receta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Consulta:</strong>
                            {{ $receta->Consulta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $receta->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $receta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Proxima cita:</strong>
                            {{ $receta->proximaCita }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Receta:</strong>
                            {{ $receta->estadoReceta->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Extendida por:</strong>
                            Doctor {{ $receta->Consulta->Persona->nombrePersonas }}{{ $receta->Consulta->Persona->apellidoPersonas }}
                        </div>
                        <div class="form-group float-right">
                            <a class="btn btn-primary text-white" href="{{ route('recetas.imprimir', $receta->id) }}" target="_blank">Ver</a>
                            <a class="btn btn-primary text-white" href="{{ route('recetas.descargar', $receta->id) }}" target="_blank">Descargar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

