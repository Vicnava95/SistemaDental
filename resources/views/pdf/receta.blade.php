<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receta</title>
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
            widtd: 100%;
        }
        tr, td {
            vertical-align: top;
            text-align: left;
            padding: 8px;
        }

        tr td:first-child {
            text-align: right;
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
                Dr. {{ $receta->Consulta->Persona->nombrePersonas }} {{ $receta->Consulta->Persona->apellidoPersonas }}<br>
                J.V.P.O. No. 16093<br>
                Doctor en Medicina Ulceras y Heridas<br>
                3 Caller Poniente, Barrio el Carmen detras del cuartel, Zacatecoluca.<br>
                Tel.: 2334-0725 Cel.: 7745-1655
            </td>
            <td class="text-center">Consultas de<br>Lunes a viernes<br>De 8:00 am a 5:00 pm<br> Sabado de 8:00 am a 12:00 Md</td>
        </tr>
        <tr>
            <td class="padding-top">Paciente:</td>
            <td class="padding-top" colspan="2">{{ $receta->Consulta->Paciente->apellidos }}
                 {{ $receta->Consulta->Paciente->nombres }}</td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td colspan="2">{{ $receta->fecha }}</td>
        </tr>
        <tr>
            <td>Descripción receta :</td>
            <td colspan="2">{{ $receta->descripcion }}</td>
        </tr>
        <tr>
            <td>Proxima cita:</td>
            <td colspan="2">{{ $receta->proximaCita }}</td>
        </tr>
    </table>
</body>
</html>
