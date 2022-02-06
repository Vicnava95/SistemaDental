<style>
    table{
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
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

}
</style>
    <div class="container-fluid">
    <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px">
        <h3>REPORTE DE RECETAS Y PRÓXIMAS CITAS</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                    <div class="card-body">
                        <div class="table-responsive">
                        @foreach ($pacientes as $paciente)
                            <h3>Listado consolidado de recetas y proximas citas del paciente: </h3>
                            <h3>{{ $paciente->nombres }} {{ $paciente->apellidos }}</h3>
                            <table style="page-break-after:always;">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Descripción - receta</th>
                                        <th style="text-align: center;">Fecha emisión</th>
										<th style="text-align: center;">Próxima cita</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($recetas as $receta)
                                        @if($receta->id == $paciente->id)
                                        <tr>
                                            <td style="text-align: center;">{{++$i}}</td> 
                                            <td>{{ $receta->descripcion }}</td> 
                                            <td>{{ $receta->fecha }}</td> 
                                            <td>{{ $receta->proximaCita }}</td> 
                                        </tr>
                                        @endif
                                        @endforeach    
                                </tbody>
                            </table>
                        @endforeach 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
