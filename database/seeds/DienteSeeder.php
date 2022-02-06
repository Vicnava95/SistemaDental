<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DienteSeeder extends Seeder
{
    //Listado de todos los dientes
    

    public function run()
    {
        static $infoDientes = array(
            array("11","Incisivo central superior derecho permanente"),
            array("12","Incisivo lateral superior derecho permanente"),
            array("13","Canino superior derecho permanente"),
            array("14","Primer premolar superior derecho permanente"),
            array("15","Segundo premolar superior derecho permanente"),
            array("16","Primer molar superior derecho permanente"),
            array("17","Segundo molar superior derecho permanente"),
            array("18","Tercer molar superior derecho permanente"),
            array("21","Incisivo central superior izquierdo permanente"),
            array("22","Incisivo lateral superior izquierdo permanente"),
            array("23","Canino superior izquierdo permanente"),
            array("24","Primer premolar superior izquierda permanente"),
            array("25","Segundo premolar superior izquierdo permanente"),
            array("26","Primer molar superior izquierda permanente"),
            array("27","Segundo molar superior izquierda permanente"),
            array("28","Tercer molar superior izquierdo permanente"),
            array("31","Incisivo central inferior izquierdo permanente"),
            array("32","Incisivo lateral inferior izquierdo permanente"),
            array("33","Canino inferior izquierdo permanente"),
            array("34","Primer premolar inferior izquierdo permanente"),
            array("35","Segundo premolar inferior izquierdo permanente"),
            array("36","Primer molar inferior izquierdo permanente"),
            array("37","Segundo molar inferior izquierdo permanente"),
            array("38","Tercer molar inferior izquierdo permanente"),
            array("41","Incisivo central inferior derecho permanente"),
            array("42","Incisivo lateral inferior derecho permanente"),
            array("43","Canino inferior derecho permanente"),
            array("44","Primer premolar inferior derecho permanente"),
            array("45","Segundo premolar inferior derecho permanente"),
            array("46","Primer molar inferior derecha permanente"),
            array("47","Segunda molar inferior derecha permanente"),
            array("48","Tercera molar inferior derecha permanente"),
        );

        for ($j = 1; $j <= 8; $j++){
            for($i = 11; $i <= 48; $i++){
                foreach ($infoDientes as $info){
                    if($i == $info[0]){
                        DB::table('dientes')->insert([
                            'numeroDiente' =>$info[0],
                            'nombreDiente' => $info[1],
                            'expedienteDental_id' => $j
                        ]);
                    }
                }
            }

        }
        
    }
}
