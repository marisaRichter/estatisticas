<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastorComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastor_comunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt_instalacao');
            $table->date('dt_desinstalacao');
            $table->integer('pastor_id')->unsigned();
            $table->foreign('pastor_id')->references('id')->on('pastores');
            $table->integer('comunidade_id')->unsigned();
            $table->foreign('comunidade_id')->references('id')->on('comunidades');
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
        Schema::dropIfExists('pastor_comunidades');
    }
}
