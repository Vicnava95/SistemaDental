
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <strong>Doctora:</strong>
                        Sandra Coto
                    </div>
                    <div class="form-group">
                        <strong>Nombre Paciente:</strong>
                        {{ $paciente->nombres }} {{ $paciente->apellidos }}
                    </div>
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {{ $recetasDentale->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $recetasDentale->fecha }}
                    </div>
                    <div class="form-group">
                        <strong>Próxima Cita:</strong>
                        {{ $recetasDentale->proximaCita }}
                    </div>
                    <div class="form-group">
                        <strong>Estado Receta</strong>
                        {{ $recetasDentale->estadoReceta->nombre }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

