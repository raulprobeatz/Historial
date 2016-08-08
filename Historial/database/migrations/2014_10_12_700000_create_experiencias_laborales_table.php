<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias_laborales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('experiencia', 100);
            $table->string('empresa', 100);   
            $table->string('tiempo',50);
            $table->string('puesto', 100);
            $table->string('epp_usados', 300);
            $table->string('factores_riesgos', 300);
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
        Schema::drop('experiencias_laborales');
    }
}
