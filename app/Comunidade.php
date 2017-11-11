<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model{
    protected $fillable = [
      'nome',
      'qtd_membros',
      'qtd_mem_com',
      'qtd_mem_vot',
      'cidade',
      'localidade',
      'qtd_jovens',
      'qtd_servas',
      'qtd_leigos',
      'qtd_criancas',
      'dt_fundacao',
    ];
}
