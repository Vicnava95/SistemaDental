<?php

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Global_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::yesterday('America/El_Salvador')->format('Y-m-d');

        DB::table('consultas')->insert([
            'descripcion'=> 'El paciente es hipocondriaco y al mismo tiempo pragmático, con una gran capacidad intelectual y de raciocinio y a la vez vital',
            'fecha' => $fecha,
            'peso'=>'60',
            'estatura' =>'1.69',
            'presion'=>'120/80',
            'temperatura'=>'36.6',
            'frecuencia_cardiaca'=>'60',
            'frecuencia_respiratoria'=>'18',
            'imc'=>'21.00',
            'solicitud_examen'=>'',
            'paciente_id'=>'1',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '1',
            'expedienteDoctor_id'=>'1'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'El diagnóstico fue confirmado por biopsia. el paciente fue tratado con medios biológicos para estimular las defensas inmunológicas',
            'fecha' => $fecha,
            'peso' => '70',
            'estatura'=>'1.70',
            'presion' => '130/80',
            'temperatura' => '36.8',
            'frecuencia_cardiaca' => '50',
            'frecuencia_respiratoria' => '18',
            'imc'=>'24.22',
            'solicitud_examen'=>'',
            'paciente_id'=>'2',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '2',
            'expedienteDoctor_id'=>'2'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Dolor de cabeza en la parte trasera de la cabeza',
            'fecha' => $fecha,
            'peso' => '80',
            'estatura'=>'1.75',
            'presion' => '90/80',
            'temperatura' => '37.1',
            'frecuencia_cardiaca' => '62',
            'frecuencia_respiratoria' => '20',
            'imc'=>'26.12',
            'solicitud_examen'=>'Radiografia de craneo',
            'paciente_id'=>'3',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '3',
            'expedienteDoctor_id'=>'3'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Problemas de vista, le cuesta ver objetivos medianamente pequeños',
            'fecha' => $fecha,
            'peso' => '55',
            'estatura'=>'1.50',
            'presion' => '100/80',
            'temperatura' => '37.2',
            'frecuencia_cardiaca' => '55',
            'frecuencia_respiratoria' => '17',
            'imc'=>'24.44',
            'solicitud_examen'=>'Examen de la vista',
            'paciente_id'=>'4',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '4',
            'expedienteDoctor_id'=>'4'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Quebradura de hueso en el brazo izquierdo',
            'fecha' => $fecha,
            'peso' => '90',
            'estatura'=>'1.65',
            'presion' => '125/80',
            'temperatura' => '36.9',
            'frecuencia_cardiaca' => '63',
            'frecuencia_respiratoria' => '19',
            'imc'=>'33.06',
            'solicitud_examen'=>'Radiografia de uso',
            'paciente_id'=>'5',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '5',
            'expedienteDoctor_id'=>'5'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Nauceas y vertigo, nivel alto de azucar',
            'fecha' => $fecha,
            'peso' => '75',
            'estatura'=>'1.73',
            'presion' => '106/80',
            'temperatura' => '35.8',
            'frecuencia_cardiaca' => '60',
            'frecuencia_respiratoria' => '20',
            'imc'=>'25.06',
            'solicitud_examen'=>'Examen de glucosa',
            'paciente_id'=>'6',
            'persona_id'=>'2'
        ]);

        DB::table('consulta_expedienteDoctor')->insert([
            'consulta_id'=> '6',
            'expedienteDoctor_id'=>'6'
        ]);
    }
}
