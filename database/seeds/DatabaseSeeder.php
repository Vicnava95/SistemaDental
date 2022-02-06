<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([SexoTableSeeder::class]);
        $this->call([PacienteTableSeeder::class]);
        $this->call([RolPersonaTableSeeder::class]);
        $this->call([PersonaTableSeeder::class]);
        $this->call([EstadoRecetaTableSeeder::class]);
        $this->call([EstadoCitaSeeder::class]);
        $this->call([CitaSeeder::class]);
        $this->call([ExpedientesDoctoraDental::class]);
        $this->call([ExpedientesDoctorGeneral::class]);
        $this->call([EstadoPagoSeeder::class]);
        $this->call([RecetasDentalesSeeder::class]);
        $this->call([DienteSeeder::class]);
        $this->call([TratamientosDienteTableSeeder::class]);
        $this->call([ConsultaSeeder::class]);
        $this->call([RecetaTableSeeder::class]);
        $this->call([PagosAbonosSeeder::class]);
        $this->call([ExamenesDentalesSeeder::class]);
        $this->call([ExamenesGeneralesSeeder::class]);
    }
}
