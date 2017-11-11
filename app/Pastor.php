<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pastor extends Model{

  protected $table = 'pastores';

  protected $fillable = [
    'anoFormatura',
    'estadoCivil',
    'dt_nascimento',
    'qtd_filhos',
    'naturalidade',
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function pastorComunidades() {
    return $this->hasMany('App\PastorComunidade');
  }
}
