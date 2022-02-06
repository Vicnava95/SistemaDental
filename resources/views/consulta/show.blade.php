
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Consulta</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $consulta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{ $consulta->Paciente->apellidos }}, {{ $consulta->Paciente->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Peso:</strong>
                            {{ $consulta->peso }} Kg
                        </div>
                        <div class="form-group">
                            <strong>Estatura:</strong>
                            {{ $consulta->estatura }} m
                        </div>
                        <div class="form-group">
                            <strong>IMC:</strong>
                            {{ $consulta->imc }} Kg/m²
                        </div>
                        <div class="form-group">
                            <strong>Presión arterial:</strong>
                            {{ $consulta->presion }} mmHg
                        </div>
                        <div class="form-group">
                            <strong>Temperatura corporal:</strong>
                            {{ $consulta->temperatura }} ºC
                        </div>
                        <div class="form-group">
                            <strong>Frecuencia cardiaca:</strong>
                            {{ $consulta->frecuencia_cardiaca }} pulsaciones/minuto
                        </div>
                        <div class="form-group">
                            <strong>Frecuencia respiratoria:</strong>
                            {{ $consulta->frecuencia_respiratoria }} respiraciones/minuto
                        </div>


                        <div class="form-group">
                            <strong>Descripcion consulta:</strong>
                            {{ $consulta->descripcion }}
                        </div>

                        <div class="form-group">
                            <strong>Examenes solicitados:</strong>
                            {{ $consulta->solicitud_examen }}
                        </div>

                        <div class="form-group">
                            <strong>Doctor:</strong>
                            {{ $consulta->Persona->nombrePersonas }} {{ $consulta->Persona->apellidoPersonas }}
                        </div>
                        <div class="form-group float-right">
                            <a class="btn btn-primary text-white" href="{{ route('consultas.imprimir', $consulta->id) }}" target="_blank">Imprimir</a>
                            <a class="btn btn-primary text-white" href="{{ route('consultas.descargar', $consulta->id) }}" target="_blank">Descargar</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
