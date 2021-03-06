<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastorComunidade extends Model
{
    //
    protected $fillable = [
      'pastor_id',
      'comunidade_id',
      'dt_instalacao',
    ];

    public function eventos() {
      return $this->hasMany('App\Evento');
    }

    public function pastor() {
      return $this->belongsTo('App\Pastor');
    }

    public function comunidade() {
      return $this->belongsTo('App\Comunidade');
    }
}
