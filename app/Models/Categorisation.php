<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorisation extends Model
{
   public function ppp() {
    return $this->belongsTo('App\Models\PPP' , 'ppp_id' , 'id') ;
   }

   public function categorie() {
    return $this->belongsTo('App\Models\Categorie' , 'categorie_id' , 'id') ;
   }

}
