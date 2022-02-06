<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //php artisan migrate
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->String('nombres')->require();
            $table->String('apellidos')->require();
            $table->String('dui',10)->nullable();
            $table->String('telefonoCasa',9)->nullable();
            $table->String('telefonoCelular',9)->require();
            $table->Date('fechaDeNacimiento')->require();
            $table->String('direccion')->require();
            $table->String('referenciaPersonal')->nullable();
            $table->String('telReferenciaPersonal')->nullable();
            $table->String('ocupacion')->nullable()->default("Sin ocupacion actualmente");
            $table->String('correoElectronico')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('sexo_id')->require();
            $table->foreign('sexo_id')->references('id')->on('sexos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // php artisan migrate:rollback
    {
        Schema::dropIfExists('pacientes');
    }
}
