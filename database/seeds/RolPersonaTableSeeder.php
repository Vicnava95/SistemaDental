<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolPersonaTableSeeder extends Seeder
{
    static $rolesPersona = [
        'Administrador',
        'Doctor General',
        'Doctora Dental',
        'Secretaria'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$rolesPersona as $rolPersona){
            DB::table('rolpersonas')->insert([
                'nombreRolPersona' => $rolPersona
            ]);
        }
    }
}
