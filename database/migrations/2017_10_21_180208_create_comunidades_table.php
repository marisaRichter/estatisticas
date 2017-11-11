<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 20);
            $table->string('cidade', 50);
            $table->string('localidade', 50);
            $table->date('dt_fundacao');
            $table->integer('qtd_membros');
            $table->integer('qtd_mem_com');
            $table->integer('qtd_mem_vot');
            $table->integer('qtd_jovens');
            $table->integer('qtd_servas');
            $table->integer('qtd_leigos');
            $table->integer('qtd_criancas');
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
        Schema::dropIfExists('comunidades');
    }
}
