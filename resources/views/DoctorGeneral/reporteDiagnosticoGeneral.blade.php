
    <style>
        .text-center {
            text-align: center;
        }

        .padding-top {
            padding-top: 30px;
        }

        .mt{
            margin-top: 30px;
        }

        .border tr td{
            border: 1px #000 solid;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        tr, td {
            vertical-align: top;
            text-align: right;
            padding: 8px;
        }

        tr td:nth-child(even) {
            text-align: left;
        }


    </style>
    
    <table>
        <tr>
            <td class="text-center">
                <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px"> <br>
                Clinica San Pablo
            </td>
            <td class="text-center">
                Gustavo Coto<br>
                Doctor en Medicina Ulceras y Heridas<br>
                JVPM No. 16093<br>
                3 Caller Poniente, Barrio el Carmen detras del cuartel, Zacatecoluca.<br>
                Tel.: 2334-0725 Cel.: 7745-1655
            </td>
            <td class="text-center">Consultas de<br>Lunes a viernes<br>De 8:00 am a 5:00 pm<br> Sabado de 8:00 am a 12:00 Md</td>
        </tr>
    </table>

    <table class="mt border">
        <tr>
            <td colspan="4" class="text-center">Informacion del paciente</td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td>{{$paciente->apellidos}}, {{$paciente->nombres}}</td>
            <td>Fecha de nacimiento:</td>
            <td>{{$paciente->fechaDeNacimiento}}</td>
        </tr>
        <tr>
            <td>Numero de casa:</td>
            <td>{{$paciente->telefonoCasa}}</td>
            <td>Numero celular:</td>
            <td>{{$paciente->telefonoCelular}}</td>
        </tr>
        <tr>
            <td>Direccion</td>
            <td colspan="3">{{$paciente->direccion}}</td>
        </tr>
    </table>

    @if (count($consultas)>0)

    @foreach ($consultas as $consulta)
        <table class="border mt">
            <tr>
                <td colspan="4" class="text-center">Informacion de la cita</td>
            </tr>
            <tr>
                <td>Descripcion:</td>
                <td colspan="3">{{$consulta->descripcion}}
            </tr>
            <tr>
                <td>Peso:</td>
                <td>{{$consulta->peso}} Kg</td>
                <td>presion:</td>
                <td>{{$consulta->presion}} mmHg</td>
            </tr>
            <tr>
                <td>Temperatura</td>
                <td >{{$consulta->temperatura}} °C</td>
                <td>Frecuencia cardiaca</td>
                <td >{{$consulta->frecuencia_cardiaca}} latidos/minuto</td>
            </tr>
            <tr>
                <td>Frecuencia_respiratoria</td>
                <td>{{$consulta->frecuencia_respiratoria}} respiraciones/minuto</td>
                <td>Fecha: </td>
                <td>{{$consulta->fecha}}</td>
            </tr>
        </table>
        @if (count($consulta->recetas)>0)
            @foreach ($consulta->recetas as $receta)
            <table class="border">
                <tr>
                    <td colspan="4" class="text-center">Informacion de la receta</td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td colspan="3">{{$receta->descripcion}}
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>{{$receta->fecha}}</td>
                    <td>Proxima cita:</td>
                    <td>{{$receta->proximaCita}}</td>
                </tr>
            </table>
            @endforeach
        @endif
    @endforeach

    @else
    <table class="mt border">
        <tr>
            <td class="text-center">No hay consultas regisradas del paciente</td>
        </tr>
    </table>
        
    @endif
    <table class="border">
    </table>

    

    
