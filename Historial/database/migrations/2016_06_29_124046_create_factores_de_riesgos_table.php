<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoresDeRiesgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factores_de_riesgos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('factor', 50);
            $table->char('control',2);
            $table->char('diagnosticado',2);
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
        Schema::drop('factores_de_riesgos');
    }
}
