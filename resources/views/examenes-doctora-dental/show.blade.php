<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Examen</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Paciente:</strong>
                        {{ $examenesDoctoraDental->expedienteDoctoraDental->id }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $examenesDoctoraDental->fecha }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $examenesDoctoraDental->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        @empty(!$examenesDoctoraDental->imagen)
                                <a href="/examenesDentalesImagenes/{{ $examenesDoctoraDental->imagen }}" target="_blank">
                                    <img name="imagenActual" src="/examenesDentalesImagenes/{{ $examenesDoctoraDental->imagen }}" class="mt-2 img-fluid">
                                </a>
                        @endempty
                        @empty($examenesDoctoraDental->imagen)
                            No hay imagen
                        @endempty
                        {{ $examenesDoctoraDental->imagen }}
                    </div>
                    
                    <div class="form-group" hidden>
                        <strong>Expediente dental:</strong>
                        {{ $examenesDoctoraDental->expediente_doctora_dental_id }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>