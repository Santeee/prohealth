<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCambiosTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambios_turnos', function (Blueprint $table) {
            $table->id();

            $table->date('dia');
            $table->time('hora_comienzo')->nullable(false);
            $table->time('hora_fin')->nullable(false);
            $table->boolean('aceptado')->default(false);

            $table->bigInteger('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('users');
            $table->bigInteger('receptor_id')->unsigned();
            $table->foreign('receptor_id')->references('id')->on('users');

            $table->bigInteger('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectores');

            $table->softDeletes();
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
        Schema::dropIfExists('cambios_turnos');
    }
}
