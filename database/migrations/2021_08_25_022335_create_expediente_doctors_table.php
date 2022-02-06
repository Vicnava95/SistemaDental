<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedienteDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente_doctors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('description')->nullable();

            //Foreign key
            $table->unsignedBigInteger('paciente_id')->unique();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });

        Schema::create('consulta_expedienteDoctor', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();

            //Foreign key
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');

            $table->unsignedBigInteger('expedienteDoctor_id');
            $table->foreign('expedienteDoctor_id')->references('id')->on('expediente_doctors')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('expediente_doctors');
        Schema::dropIfExists('consulta_expedienteDoctor');
    }
}
