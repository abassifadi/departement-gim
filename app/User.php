<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

   public function getFullNameAttribute()
   {
        return $this->attributes['nom'] .' '. $this->attributes['prenom'];
    }

      public function filiere() {
         return $this->belongsTo('App\Models\Filiere' , 'filiere_id' , 'id') ;
      }

      public function option() {
         return $this->belongsTo('App\Models\Option' , 'option_id' , 'id') ;
      }

      public function binome() {
         return $this->belongsTo('App\Models\Binomage' , 'binom_id' , 'id') ;
      }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
