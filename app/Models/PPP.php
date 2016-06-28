<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PPP extends Model
{
    protected $table = 'ppp' ;

    public function professeur() {
      return $this->belongsTo('App\Models\Professeur' , 'professeur_id' , 'id') ;
    }

    public function encadrement() {
      return $this->belongsTo('App\Models\Encadrement' , 'encadrement_id' , 'id') ;
    }

    public function categorisations() {
      return $this->hasMany('App\Models\Categorisation', 'ppp_id', 'id');
    }
}
