<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Filiere as Filiere ;
use App\Models\Binomage as Binome ;

/**
 * Handles Projects Assignement to students.
 */

class AdminPPPAffectationController extends Controller
{

    /**
     * Order Students Groups Based On Their scores
     * Each Sub group Contains 2 or 3 Students
    */
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
