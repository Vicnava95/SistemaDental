<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadoCitaSeeder extends Seeder
{

    static $estadoCitas = [
        'Finalizada',
        'Cancelada',
        'Programada'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$estadoCitas as $estadoCita) {
            DB::table('estado_citas')->insert([
                'nombre' => $estadoCita
            ]);
        }
    }
}
