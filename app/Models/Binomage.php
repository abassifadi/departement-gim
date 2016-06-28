<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Binomage extends Model
{
  public function etudiants() {
    return $this->hasMany('App\User', 'binom_id', 'id');
  }

  public function choix() {
        return $this->hasMany('App\Models\Choix', 'binom_id', 'id');
  }

  public function filiere() {
    return $this->belongsTo('App\Models\Filiere', 'filiere_id', 'id');
  }

  public function encadrement() {
    return $this->hasOne('App\Models\Encadrement','binom_id','id');
  }

}
