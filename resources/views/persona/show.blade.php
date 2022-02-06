
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <strong>Nombres:</strong>
                        {{ $persona->nombrePersonas }}
                    </div>
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        {{ $persona->apellidoPersonas }}
                    </div>
                    <div class="form-group">
                        <strong>DUI:</strong>
                        {{ $persona->dui }}
                    </div>
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $persona->telefono }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de nacimiento:</strong>
                        {{ $persona->fechaDeNacimiento }}
                    </div>
                    <div class="form-group">
                        <strong>NIT:</strong>
                        {{ $persona->nitPersona }}
                    </div>
                    <div class="form-group">
                        <strong>Sexo:</strong>
                        @foreach ($sexos as $sexo)
                            @if ($sexo->id == $persona->sexo_id)
                                {{ $sexo->nombre }}
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <strong>Rol persona:</strong>
                        @foreach ($roles as $rol)
                            @if ($rol->id == $persona->rolpersona_id)
                                <td>{{ $rol->nombreRolPersona }}</td>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

