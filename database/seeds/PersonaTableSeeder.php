<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            'nombrePersonas'=> 'Adolfo Cesar',
            'apellidoPersonas'=>'Pineda Gonzales',
            'dui'=>'05148656-8',
            'telefono'=>'7450-9297',
            'fechaDeNacimiento'=>'1988-01-01',
            'nitPersona'=>'0614-080395-101-1',
            'sexo_id'=>'1',
            'rolpersona_id'=>'1'
            ]);

        DB::table('personas')->insert([
            'nombrePersonas'=> 'Gustavo Heriberto',
            'apellidoPersonas'=>'Coto Caballero',
            'dui'=>'',
            'telefono'=>'7450-9297',
            'fechaDeNacimiento'=>'1988-01-01',
            'nitPersona'=>'',
            'sexo_id'=>'1',
            'rolpersona_id'=>'2'
            ]);  

        DB::table('personas')->insert([
            'nombrePersonas'=> 'Sandra',
            'apellidoPersonas'=>'Coto Caballero',
            'dui'=>'',
            'telefono'=>'7745-1655',   
            'fechaDeNacimiento'=>'1990-01-01',
            'nitPersona'=>'',
            'sexo_id'=>'2',
            'rolpersona_id'=>'3'
            ]);  

        DB::table('personas')->insert([
            'nombrePersonas'=> 'Maria Carmen',
            'apellidoPersonas'=>'Dolores Pilar',
            'dui'=>'',
            'telefono'=>'7635-2268',   
            'fechaDeNacimiento'=>'1995-01-01',
            'nitPersona'=>'',
            'sexo_id'=>'1',
            'rolpersona_id'=>'4'
            ]);  
    }
}
