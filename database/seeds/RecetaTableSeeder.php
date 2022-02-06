<?php

use Carbon\Carbon;
use App\Models\Receta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::yesterday('America/El_Salvador')->format('Y-m-d');

        DB::table('recetas')->insert([
            'descripcion' => 'Paroxetina Mylan  20 mg, Comprimidos recubiertos con pelicula EFG, Tomas 1 pastilla c/d.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(40),
            'consulta_id' => '1',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => 'Sertralina ALMUS , Comprimidos recubiertos con pelicula EFG, 25 mg los primeros 2 dias, luego 50 mg durante 5 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(10),
            'consulta_id' => '2',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => 'Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 7 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(20),
            'consulta_id' => '3',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Gotas Ciprofloxacina oftálmica, aplicar c/4h. durante 14 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(8),
            'consulta_id' => '4',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 15 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(7),
            'consulta_id' => '5',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Dimenhidrinato De 50 a 100 mg (via oral) , 30-60 minutos antes de viajar, de ser necesario continuar con igual dosis cada 6-8 horas.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(9),
            'consulta_id' => '6',
            'estadoReceta_id'=>'1'
        ]);
    }
}
