<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pastor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastores', function (Blueprint $table) {
          $table->increments('id');
          $table->date('dt_nascimento');
          $table->string('naturalidade', 50);
          $table->string('estadoCivil', 50);
          $table->integer('anoFormatura');
          $table->integer('qtd_filhos');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('pastores', function (Blueprint $table) {
            //
        });
    }
}
