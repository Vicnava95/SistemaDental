<?php

use Illuminate\Database\Seeder;

class EstadoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_pagos')->insert([
            'nombre' => 'Completo'
        ]);

        DB::table('estado_pagos')->insert([
            'nombre' => 'Incompleto'
        ]);
    }
}
