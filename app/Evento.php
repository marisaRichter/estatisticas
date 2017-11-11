<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  protected $fillable = [
    'dt_evento',
    'qtd_envolvidos',
    'tp_evento_id',
    'past_com_id',
  ];

  public function tiposDeEventos() {
    return $this->belongsTo('App\TiposDeEvento', 'tp_evento_id');
  }

  public function pastorComunidade() {
    return $this->belongsTo('App\PastorComunidade', 'past_com_id');
  }
}
