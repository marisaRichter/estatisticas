<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDeEvento extends Model{

  protected $fillable = [
    'nome',
    'descricao',
  ];

  public function eventos() {
    return $this->hasMany('App\Evento');
  }
}
