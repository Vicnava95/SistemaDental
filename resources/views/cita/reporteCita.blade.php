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
</style>
    <div class="container-fluid">
        <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px">
        <h3>REPORTE CONSOLIDADO DE CITAS DR. {{ Auth::user()->name }}</h3>
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
                                        <th>Paciente</th>
                                        <th>Fecha</th>
										<th>Hora</th>
                                        <th>Estado</th>
                                        @if(Auth::user()->rols_fk==1||Auth::user()->rols_fk==4)
                                        <th>Doctor</th>
                                        @endif                                    
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{++$i}}</td> 
                                            <td>{{ $cita->nombres }} {{ $cita->apellidos  }}</td> 
                                            <td>{{ $cita->fecha }}</td> 
                                            <td>{{ $cita->hora }}</td> 
                                            <td>{{ $cita->nombre }}</td> 
                                            @if(Auth::user()->rols_fk==1||Auth::user()->rols_fk==4)
                                            <td>{{ $cita->nombrePersonas }} {{ $cita->apellidoPersonas }}</td>
                                            @endif
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