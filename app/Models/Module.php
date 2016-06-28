<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
     protected $fillable =  ['nom', 'description', 'coeficient', 'planning', 'filiere_id' ,'professeur_id', 'created_at', 'updated_at'];

    public function professeur() {
      return $this->belongsTo('App\Models\Professeur' , 'professeur_id' , 'id') ;
    }

    public function filiere() {
      return $this->belongsTo('App\Models\Filiere' , 'filiere_id' , 'id') ;
    }
}
