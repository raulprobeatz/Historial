<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->tinyInteger('edad');
            $table->string('cedula', 11)->unique();
            $table->char('sexo', 1);
            $table->string('estado_civil', 10);
            $table->string('telefono_casa', 10)->nullable();
            $table->string('telefono_movil', 10)->nullable();
            $table->string('direccion', 100);
            $table->tinyInteger('numero_dependientes')->nullable();
            $table->string('tiempo_traslado',50)->nullable();
            $table->string('foto', 100)->default('/img/sidebar_usuario-corporativo.png');
            $table->string('seguro_medico', 100)->nullable();
            $table->integer('nss')->nullable();
            $table->string('lugar_origen', 100)->nullable();
            $table->string('donde_esta', 100)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            
            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
