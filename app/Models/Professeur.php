<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Professeur extends Authenticatable
{

    public function modules() {
      return $this->hasMany('App\Models\Module', 'professeur_id', 'id');
    }

    public function ppp() {
      return $this->hasMany('App\Models\PPP', 'professeur_id', 'id');
    }

    public function soutenances() {
      return $this->hasMany('App\Models\Soutenance', 'professeur_id', 'id');
    }

    public function getFullNameAttribute()
    {
         return $this->attributes['nom'] .' '. $this->attributes['prenom'];
     }
}
