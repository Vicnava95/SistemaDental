<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExamenesDentalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::today('America/El_Salvador')->format('Y-m-d');

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127164651.jpg',
            'descripcion'=>'Radiografía de dientes',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'1',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127164848.jpg',
            'descripcion'=>'Radiografía de dientes frontal',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'2',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127164858.jfif',
            'descripcion'=>'Radiografía de dientes',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'3',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127164911.jfif',
            'descripcion'=>'Radiografía de dientes',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'4',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127165337.jfif',
            'descripcion'=>'Radiografía de dientes',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'5',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127165523.jfif',
            'descripcion'=>'Radiografía de dientes fromtal',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'6',
        ]);

        
        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127172836.jfif',
            'descripcion'=>'Radiografía de dientes',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'7',
        ]);

        DB::table('examenes_doctora_dentals')->insert([
            'imagen'=> '20211127172854.jfif',
            'descripcion'=>'Radiografía de dientes molares',
            'fecha'=>$fecha,
            'expediente_doctora_dental_id'=>'8',
        ]);
    }
}
