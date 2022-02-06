<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SexoTableSeeder extends Seeder
{


    static $desc_sexos =[
        'Masculino',
        'Femenino'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //DB::table('sexos')->truncate();


        foreach(self::$desc_sexos as $desc_sexo){
            DB::table('sexos')->insert([
                'nombre' => $desc_sexo
            ]);
        }

    }
}
