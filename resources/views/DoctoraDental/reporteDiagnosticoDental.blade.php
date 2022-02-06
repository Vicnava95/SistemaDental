
<style>
    table{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%
    }

    h3{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        text-align: center;
    }

    td, th{
        border: 1px solid #dddddd;
        text-align: left;
    }

    tr:nth-child(even){
        background-color:#dddddd;
    }

    .bold {
        font-weight: bold;
    }

    .centrar {
        text-align: center;
    }
</style>
    <div class="container-fluid">
        <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px">
        <h3>REPORTE CONSOLIDADO DE DIAGNOSTICO DENTAL DEL PACIENTE.</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
										<th>Celular</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $paciente->nombres }}</td>
                                        <td>{{ $paciente->apellidos }}</td>
                                        <td>{{ $paciente->telefonoCelular  }}</td>
                                        <td>{{ $paciente->fechaDeNacimiento }}</td>
                                        <td>{{ $paciente->direccion }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--Tabla de dientes-->
                            <br>
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th colspan="2">ODONTOGRAMA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bold">Nº Diente</td>
                                        <td class="bold">Descripción</td>
                                    </tr>
                                    @foreach($dientes as $diente)
                                    <tr>
                                        <td>{{ $diente->numeroDiente }}</td>
                                        <td>{{ $diente->nombreDiente }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <!--Tabla de tratamientos-->

                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th colspan="2">HISTORIAL DE TRATAMIENTOS POR PIEZA DENTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                            <tr>
                                                <td class="bold">Nº Diente</td>
                                                <td class="bold">Tratamiento</td>
                                            </tr>
                                    <!-- Prueba Definitiva -->
                                    @foreach($dientes as $diente)
                                        @for($j = 0; $j < sizeof($tratamientos) - 1 ; $j++)
                                            @if($diente->id == $tratamientos[$j]->diente_id)
                                            <tr>
                                                <td>{{ $diente->numeroDiente }}</td>
                                                <td>{{ $tratamientos[$j]->descripcion }}</td>
                                            </tr>
                                            @endif
                                        @endfor
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <!--Tabla de recetas-->
                            <table>
                                <thead class="thead">
                                    <tr>
                                        <th colspan="3">HISTORIAL DE RECETAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bold">Receta</td>
                                        <td class="bold">Fecha de emision</td>
                                        <td class="bold">Descripción</td>
                                    </tr>
                                @php $l=0; @endphp
                                    @foreach($recetas as $receta)
                                    <tr>
                                        <td>{{ ++$l }}</td>
                                        <td>{{ $receta->fecha }}</td>
                                        <td>{{ $receta->descripcion }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
