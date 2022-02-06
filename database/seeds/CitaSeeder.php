<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::today('America/El_Salvador')->format('Y-m-d');

        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'1',
            'persona_id'=>'2',
            'estadoCita_id'=>'3',
            'hora'=>'8:00:00'
        ]);
        
        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'2',
            'persona_id'=>'2',
            'estadoCita_id'=>'3',
            'hora'=>'9:00:00'
        ]);

        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'3',
            'persona_id'=>'3',
            'estadoCita_id'=>'3',
            'hora'=>'10:00:00'
        ]);
        
        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'4',
            'persona_id'=>'3',
            'estadoCita_id'=>'3',
            'hora'=>'11:00:00'
        ]);

        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'5',
            'persona_id'=>'3',
            'estadoCita_id'=>'3',
            'hora'=>'13:00:00'
        ]);
        
        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'6',
            'persona_id'=>'2',
            'estadoCita_id'=>'3',
            'hora'=>'14:00:00'
        ]);

        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'7',
            'persona_id'=>'3',
            'estadoCita_id'=>'3',
            'hora'=>'15:00:00'
        ]);

        DB::table('citas')->insert([
            'fecha'=> $fecha,
            'paciente_id'=>'8',
            'persona_id'=>'2',
            'estadoCita_id'=>'3',
            'hora'=>'16:00:00'
        ]);
    }
}
