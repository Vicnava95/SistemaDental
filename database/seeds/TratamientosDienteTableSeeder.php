<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\While_;

class TratamientosDienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1;$i<=256;$i++){
            DB::table('tratamientos')->insert([
                'fecha' => '2021-11-25',
                'descripcion' => 'Blanqueamiento con láser',
                'diente_id' => $i
            ]);
        }
        $j=1;
        While($j<=225){
            DB::table('tratamientos')->insert([
                'fecha' => '2021-11-25',
                'descripcion' => 'Empaste de coloración dental',
                'diente_id' => $j
            ]);
            $j=$j+32;
        }

        $k = 5;
        while ($k <= 225) {
            DB::table('tratamientos')->insert([
                'fecha' => '2021-11-25',
                'descripcion' => 'Colocacion de carilla',
                'diente_id' => $k
            ]);
            $k = $k + 32;
        }





    }
}
