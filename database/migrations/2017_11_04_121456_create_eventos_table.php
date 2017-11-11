<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt_evento');
            $table->integer('qtd_envolvidos');
            $table->integer('tp_evento_id')->unsigned();
            $table->foreign('tp_evento_id')->references('id')->on('tipos_de_eventos');
            $table->integer('past_com_id')->unsigned();
            $table->foreign('past_com_id')->references('id')->on('pastor_comunidades');
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
        Schema::dropIfExists('eventos');
    }
}
