<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    protected $table = 'choix' ;

    public function ppp() {
      return $this->belongsTo('App\Models\PPP', 'ppp_id', 'id');
    }
}
