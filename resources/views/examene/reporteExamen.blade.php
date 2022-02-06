<style>
    table, p{
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
        <h3>REPORTE DE EXAMENES</h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                    <div class="card-body">
                        <div class="table-responsive">
                        @foreach ($pacientes as $paciente)
                            <h3>Listado consolidado de examenes del paciente: </h3>
                            <h3>{{ $paciente->nombres }} {{ $paciente->apellidos }}</h3>
                            
                            <table style="page-break-after:always;">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Imagen</th>
                                        <th style="text-align: center;">Fecha registro</th>
										<th style="text-align: center;">Descripción</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($examenes as $examen)
                                        <tr>
                                            <td style="text-align: center;">{{++$i}}</td> 
                                            <td><img src="{{ public_path().'/examenesGeneralesImagenes/20211127003544.png' }}" width="300px" heigth="300px"></td> 
                                            <td>{{ $examen->fecha }}</td> 
                                            <td>{{ $examen->descripcion }}</td> 
                                        </tr>
                                        @endforeach    
                                </tbody>
                            </table>
                            
                            <!-- @foreach ($examenes as $examen)
                                @if($examen->id == $paciente->id)
                                <div>
                                    <p style="text-align: center;">Fecha de registro: {{ $examen->fecha }}</p>
                                    <div style="text-align: center;">
                                    <img src="{{ public_path().'/examenesGeneralesImagenes/20211127003544.png' }}" width="500px" heigth="500px">    
                                    </div>
                                </div>
                                
                                @endif
                            @endforeach 
                        @endforeach -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
