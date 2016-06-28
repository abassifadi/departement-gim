<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
  public function modules() {
    return $this->hasMany('App\Models\Module', 'professeur_id', 'id');
  }

  public function options() {
    return $this->hasMany('App\Models\Option', 'filiere_id', 'id');
  }

  public function etudiants() {
    return $this->hasMany('App\User', 'filiere_id', 'id');
  }

  public function binomes() {
    return $this->hasMany('App\Models\Binomage', 'filiere_id', 'id');
  }
}
