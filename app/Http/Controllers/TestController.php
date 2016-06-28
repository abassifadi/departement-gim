<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module as Module ;
use App\Models\Professeur as Professeur ;
use App\Models\Filiere as Filiere ;
use App\Models\Option as Option ;
use App\User as Etudiant ;
use App\Models\PPP as PPP ;
use App\Http\Requests;

class TestController extends Controller
{
    public function index() {

       //$option = Professeur::find(1) ;
       // $option = $option->ppp;
      $encadrement_ppp = "";
      $binome = \Auth::user()->binome ;
      if(!is_null($binome)) {
        $binome_id = $binome->id ;
        $encadrement = $binome->encadrement ;
        if(!is_null($encadrement)) {
          $encadrement_ppp = $encadrement->ppp->name;
          return view('user.welcome')->withSuccess('Vous êtes affecte au sujet : '.$encadrement_ppp);
        }
      }
       return view('user.welcome') ;
    }

    public function professeur() {
       return view('professeur.welcome') ;

    }
}
