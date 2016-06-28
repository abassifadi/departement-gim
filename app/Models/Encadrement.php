<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encadrement extends Model
{
    public function ppp() {
      return $this->hasOne('App\Models\PPP', 'id', 'ppp_id');
    }

    public function soutenance(){
      return $this->hasOne('App\Models\Soutenance', 'id', 'soutenance_id');
    }

    public function binome(){
      return $this->hasOne('App\Models\Binomage', 'id', 'binom_id');
    }


}
