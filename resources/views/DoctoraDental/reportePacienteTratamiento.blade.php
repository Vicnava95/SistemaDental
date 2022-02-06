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

    h4{
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
</style>
    <div class="container-fluid">
        <h3>REPORTE DE TRATAMIENTOS</h3>
        <h4>Dra. Sandra Coto</h4>
        <h3 class="text">Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h3>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Número</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrayTratamiento as $aTratamiento)
                                    @if ($aTratamiento['idDiente'] != 0)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            @foreach ($dientes as $diente)
                                                @if ($aTratamiento['idDiente'] == $diente->id)
                                                <td>{{$diente->nombreDiente}}</td>    
                                                <td>{{$diente->numeroDiente}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$aTratamiento['fecha']}}</td>
                                            <td>{{$aTratamiento['descripcion']}}</td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>