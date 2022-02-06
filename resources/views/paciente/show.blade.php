<!-- Agregar contenido de la pagina web-->

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Nombres:</strong>
                                {{ $paciente->nombres }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Apellidos:</strong>
                                {{ $paciente->apellidos }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Dui:</strong>
                                {{ $paciente->dui }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Teléfono de casa:</strong>
                                {{ $paciente->telefonoCasa }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Teléfono celular:</strong>
                                {{ $paciente->telefonoCelular }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Fecha de nacimiento:</strong>
                                {{ $paciente->fechaDeNacimiento }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                {{ $paciente->direccion }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Referencia personal:</strong>
                                {{ $paciente->referenciaPersonal }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Teléfono de referencia personal:</strong>
                                {{ $paciente->telReferenciaPersonal }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Ocupación:</strong>
                                {{ $paciente->ocupacion }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Correo electrónico:</strong>
                                {{ $paciente->correoElectronico }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <strong>Sexo:</strong>
                                {{ $paciente->Sexo->nombre }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
