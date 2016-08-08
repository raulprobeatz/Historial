<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitosToxicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_toxicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('habito', 50);
            $table->string('frecuencia', 20);
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
        Schema::drop('habitos_toxicos');
    }
}
