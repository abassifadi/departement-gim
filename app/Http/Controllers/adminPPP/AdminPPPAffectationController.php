<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Filiere as Filiere ;
use App\Models\Binomage as Binome ;

class AdminPPPAffectationController extends Controller
{
    public function obtenirRangBinome() {

          $filieres = Filiere::all();

          foreach ($filieres as $filiere) {
               $binomes = Binome::whereRaw('filiere_id = ?',array($filiere->id))->orderBy('moyenne','DESC')->get();
                  $i = 1;

                foreach ($binomes as $binome) {
                      if(($binome->moyenne >0)&&($binome->etudiants->count()>0)) {
                        $binome->rang = $i ;
                        $binome->save();
                        $i++;
                      }
                }
          }

      return view('admin_ppp.affecter.list_ranked',compact('filieres'));  


    }
}
