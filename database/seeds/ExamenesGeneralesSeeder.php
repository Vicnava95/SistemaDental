<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExamenesGeneralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::today('America/El_Salvador')->format('Y-m-d');

        DB::table('examenes')->insert([
            'imagen'=> '20211127180357.jfif',
            'descripcion'=>'Radiografía de rodilla',
            'fecha'=>$fecha,
            'consulta_id'=>'1'
        ]);

        DB::table('examenes')->insert([
            'imagen'=> '20211127180717.jfif',
            'descripcion'=>'Radiografía de tobillo',
            'fecha'=>$fecha,
            'consulta_id'=>'2'
        ]);

        DB::table('examenes')->insert([
            'imagen'=> '20211127181233.jfif',
            'descripcion'=>'Radiografia de manos',
            'fecha'=>$fecha,
            'consulta_id'=>'3'
        ]);

        DB::table('examenes')->insert([
            'imagen'=> '20211127181258.jfif',
            'descripcion'=>'Radiografía de tórax',
            'fecha'=>$fecha,
            'consulta_id'=>'4'
        ]);

        DB::table('examenes')->insert([
            'imagen'=> '20211127181346.jfif',
            'descripcion'=>'Radiografía de dedo',
            'fecha'=>$fecha,
            'consulta_id'=>'5'
        ]);

        DB::table('examenes')->insert([
            'imagen'=> '20211127181416.jfif	',
            'descripcion'=>'Radiografía de rodilla',
            'fecha'=>$fecha,
            'consulta_id'=>'6'
        ]);
    }
}
