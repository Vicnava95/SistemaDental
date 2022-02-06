<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Cita</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Paciente:</strong>
                        {{ $cita->Paciente->apellidos }}, {{ $cita->Paciente->nombres }}
                    </div>
                    <div class="form-group">
                        <strong>Doctor:</strong>
                        {{ $cita->Persona->nombrePersonas }}, {{ $cita->Persona->apellidoPersonas }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $cita->fecha }}
                    </div>
                    <div class="form-group">
                        <strong>Hora:</strong>
                        {{ $cita->hora }}
                    </div>
                    <div class="form-group">
                        <strong>Estado de la cita:</strong>
                        {{ $cita->EstadoCita->nombre }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
