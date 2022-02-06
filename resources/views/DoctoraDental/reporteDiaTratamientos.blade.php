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
        <h4>{{$fecha}}</h4>
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
                                        <th>No</th>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
										<th>Diente</th>
                                        <th>Paciente</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($tratamientos as $tratamiento)
                                        <tr>
                                            <td>{{++$i}}</td> 
                                            <td>{{ $tratamiento->fecha }}</td> 
                                            <td>{{ $tratamiento->descripcion }}</td> 
                                            <td>{{ $tratamiento->diente->nombreDiente }}</td> 

                                            @foreach ($pacientes as $paciente)
                                                @if ($paciente->id == $tratamiento->diente->expedienteDental_id)
                                                    <td>{{ $paciente->nombres }}</td>
                                                @endif
                                            @endforeach
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