<?php

use Carbon\Carbon;
use App\Models\RecetasDentales;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetasDentalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::yesterday('America/El_Salvador')->format('Y-m-d');

        DB::table('recetas_dentales')->insert([
            'descripcion' => 'Paroxetina Mylan  20 mg, Comprimidos recubiertos con pelicula EFG, Tomas 1 pastilla c/d.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(40),
            'expedienteDental_id' => '1',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => 'Sertralina ALMUS , Comprimidos recubiertos con pelicula EFG, 25 mg los primeros 2 dias, luego 50 mg durante 5 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(10),
            'expedienteDental_id' => '2',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => 'Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 7 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(20),
            'expedienteDental_id' => '3',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => ' Gotas Ciprofloxacina oftálmica, aplicar c/4h. durante 14 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(8),
            'expedienteDental_id' => '4',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => ' Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 15 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(7),
            'expedienteDental_id' => '5',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => ' Dimenhidrinato De 50 a 100 mg (via oral) , 30-60 minutos antes de viajar, de ser necesario continuar con igual dosis cada 6-8 horas.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(9),
            'expedienteDental_id' => '6',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => ' Ibuprofeno 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 15 dias.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(7),
            'expedienteDental_id' => '7',
            'estadoReceta_id'=>'1'
        ]);

        DB::table('recetas_dentales')->insert([
            'descripcion' => ' Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 2 semanas.',
            'fecha' => $fecha,
            'proximaCita' => Carbon::parse($fecha)->addDays(7),
            'expedienteDental_id' => '8',
            'estadoReceta_id'=>'1'
        ]);
    }
}
