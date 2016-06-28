<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soutenance extends Model
{
    public function encadrement() {
      return $this->belongsTo('App\Models\Encadrement', 'encadrement_id', 'id');
    }
}
