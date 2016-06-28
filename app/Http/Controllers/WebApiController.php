<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Filiere as Filiere ;
use App\Models\Categorie as Categorie ;
use App\Models\Categorisation as Categorisation ;
use App\Models\PPP as PPP ;
use App\User as User;

class WebApiController extends Controller
{
    public function postIndex(Request $request) {

        $result = array();

        $filieres = Filiere::whereRaw('id = ?' , array(1))->get();
        foreach($filieres as $filiere)
        {

          array_push($result ,
          array(
              strval($filiere->id) => $filiere->etudiants->toArray()
              )) ;
        }

      //  array_push($result , $etudiants) ;

        return $result;
    }
}
