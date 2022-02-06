<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'Karen Peñate',
            'email'=>'karen.penate@ues.edu.sv',
            'password'=>Hash::make('karen123'),
            'rols_fk'=>'1',
        ]);

        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=>'admin@ues.edu.sv',
            'password'=>Hash::make('admin123'),
            'rols_fk'=>'1',
        ]);

        DB::table('users')->insert([
            'name'=> 'Gustavo Coto',
            'email'=>'gustavo@ues.edu.sv',
            'password'=>Hash::make('gustavo123'),
            'rols_fk'=>'2',
        ]);

        DB::table('users')->insert([
            'name'=> 'Sandra Coto',
            'email'=>'sandra@ues.edu.sv',
            'password'=>Hash::make('sandra123'),
            'rols_fk'=>'3',
        ]);

        DB::table('users')->insert([
            'name'=> 'Maria Carmen Dolores Pilar',
            'email'=>'maria@ues.edu.sv',
            'password'=> Hash::make('maria123'),
            'rols_fk'=>'4',
        ]);

    }
}
