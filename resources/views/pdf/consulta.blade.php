<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consulta</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>

        .text-center {
            text-align: center;
        }

        .padding-top {
            padding-top: 30px;
        }

        table {
            position: absolute;
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

</head>
<body>

    <table>
        <tr>
            <td class="text-center">
                <img src="{{ public_path().'/assets/img/Logo.png' }}" alt="Logo" height="40px"> <br>
                Clinica San Pablo
            </td>
            <td class="text-center">
                Dr. {{ $consulta->Persona->apellidoPersonas }}, {{ $consulta->Persona->nombrePersonas }}<br>
                J.V.P.O. No. 16093<br>
                Doctor en Medicina Ulceras y Heridas<br>
                3 Caller Poniente, Barrio el Carmen detras del cuartel, Zacatecoluca.<br>
                Tel.: 2334-0725 Cel.: 7745-1655
            </td>
            <td class="text-center">Consultas de<br>Lunes a viernes<br>De 8:00 am a 5:00 pm<br> Sabado de 8:00 am a 12:00 Md</td>
        </tr>
        <tr>
            <td class="padding-top">Paciente:</td>
            <td class="padding-top" colspan="2">
                {{ $consulta->Paciente->apellidos }} {{ $consulta->Paciente->nombres }}
            </td>
        </tr>
        <tr>
            <td class="padding-top">Peso:</td>
            <td class="padding-top" colspan="2">{{ $consulta->peso }} Kg</td>
        </tr>
        <tr>
            <td >Estatura:</td>
            <td colspan="2">{{ $consulta->estatura }} Kg</td>
        </tr>
        <tr>
            <td>IMC:</td>
            <td colspan="2">{{ $consulta->imc }} Kg/m²</td>
        </tr>
        <tr>
            <td>Presión:</td>
            <td colspan="2">{{ $consulta->presion }} mmHg</td>
        </tr>
        <tr>
            <td>Temperatura:</td>
            <td colspan="2">{{ $consulta->temperatura }} ºC</td>
        </tr>
        <tr>
            <td>Frecuencia cardiaca:</td>
            <td colspan="2">{{ $consulta->frecuencia_cardiaca }} pulsaciones/minuto</td>
        </tr>
        <tr>
            <td>Frecuencia respiratoria:</td>
            <td colspan="2">{{ $consulta->frecuencia_respiratoria }} respiraciones/minuto</td>
        </tr>
        <tr>
            <td>Descripcion:</td>
            <td colspan="2">{{ $consulta->descripcion }}</td>
        </tr>
        <tr>
            <td>Examanes solicitados:</td>
            <td colspan="2">{{ $consulta->solicitud_examen }}</td>
        </tr>
    </table>
</body>
</html>
