<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesPatologicosFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('antecedentes_patologicos_familiares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enfermedad', 50);
            $table->string('tipo', 20);
            $table->char('diagnosticado',2);
            $table->char('control',2);
            $table->char('tratado',2);
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
        Schema::drop('antecedentes_patologicos_familiares');
    }
}
