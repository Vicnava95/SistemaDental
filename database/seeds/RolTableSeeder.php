<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolTableSeeder extends Seeder
{
    static $roles = [
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
        foreach(self::$roles as $rol){
            DB::table('rols')->insert([
                'nombreRol' => $rol
            ]);
        }
    }
}
