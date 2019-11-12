<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_laborals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa')->nullable();
            $table->string('puesto')->nullable();
            $table->string('departamento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_termino')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencia_laborals');
    }
}
