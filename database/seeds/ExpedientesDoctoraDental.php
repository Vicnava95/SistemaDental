<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExpedientesDoctoraDental extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 1,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 2,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 3,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 4,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 5,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 6,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 7,
        ]);
        DB::table('expediente_doctora_dentals')->insert([
            'paciente_id' => 8,
        ]);
        
    }
}
