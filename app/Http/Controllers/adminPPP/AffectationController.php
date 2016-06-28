<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Filiere as Filiere ;
use App\Models\Binomage as Binome ;
use App\Models\Encadrement as Encadrement ;
use App\Models\PPP as PPP ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AffectationController extends Controller
{
    public function affecterLesSujetsParFiliere($filiere_id){

            $liste_binome_range = Binome::whereRaw('filiere_id = ?',array($filiere_id))
                                  ->whereRaw('moyenne > ?',array(0))
                                  ->whereRaw('rang > ?',array(0))
                                  ->orderBy('moyenne','desc')
                                  ->get() ;

            //Loop Through Binome
            foreach($liste_binome_range as $binome) {

                  //Test If Binome Is Affected
                $existing_encadrement = Encadrement::whereRaw('binom_id = ?',array($binome->id))
                                        ->first();
                 //Si le Binome N'est pas affecte
                if(is_null($existing_encadrement)){
                    $compteur = 0;
                    $affectation = 0;
                    $choix = $binome->choix;

                    foreach($choix as $choice) {
                        if($affectation==0) {
                              //Check If Choix Est Deja affecté
                              $exisiting_sujet_affectation = Encadrement::whereRaw('ppp_id = ?',array($choice->ppp->id))
                                                              ->first();

                              if(is_null($exisiting_sujet_affectation)){
                               $encadrement = new Encadrement ;
                               $encadrement->binom_id = $binome->id ;
                               $encadrement->ppp_id = $choice->ppp_id ;
                               $encadrement->professeur_id = $choice->ppp->professeur_id;
                               $encadrement->save();
                               $sujet = PPP::findOrFail($choice->ppp_id);
                               $sujet->encadrement_id = $encadrement->id;
                               $sujet->save();
                               $affectation = 1 ;
                              }
                        }

                    }
                }

            }

          return redirect()->route('AdminPPP.professeur.listebinomerang');

    }
}
