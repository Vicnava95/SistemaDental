<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadoRecetaTableSeeder extends Seeder
{
    static $estadoRecetas = [
        'Activa',
        'Inactiva'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$estadoRecetas as $estadoReceta) {
            DB::table('estado_recetas')->insert([
                'nombre' => $estadoReceta
            ]);
        }
    }
}
