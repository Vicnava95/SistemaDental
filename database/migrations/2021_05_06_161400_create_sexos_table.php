<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //php artisan migrate
    {
        Schema::create('sexos', function (Blueprint $table) {
            $table->id();
            $table->enum('nombre',['Masculino','Femenino'])->require()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // php artisan migrate:rollback
    {
        Schema::dropIfExists('sexos');
    }
}
