<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function filiere() {
       return $this->belongsTo('App\Models\Filiere' , 'filiere_id' , 'id') ;
    }

    public function etudiants() {
      return $this->hasMany('App\User', 'option_id', 'id');
    }
}
