<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestoDeTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto_de_trabajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('puesto', 50);
            $table->string('jornada', 50);
            $table->string('horario', 10);
            $table->string('area_vicerrectoria', 50);
            $table->timestamps();
            $table->engine = 'InnoDB';
            
            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puesto_de_trabajos');
    }
}
