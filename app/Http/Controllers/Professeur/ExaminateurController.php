<?php

namespace App\Http\Controllers\Professeur;

use Illuminate\Http\Request;
use App\Models\Encadrement as Encadrement ;
use App\Models\Professeur as Professeur ;
use App\Models\CritereExaminateur as CritereExaminateur ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ExaminateurController extends Controller
{
    public function getPPPNotesPage($ppp_id){
      $encadrement = Encadrement::join('soutenances', 'soutenances.id', '=', 'encadrements.soutenance_id')
                      ->whereRaw('ppp_id = ?',array($ppp_id))
                      ->whereRaw('soutenances.professeur_id = ?',array(\Auth::guard('professeur')->id()))
                      ->select('encadrements.id')
                      ->first();

      $criteres = CritereExaminateur::all();
      return view('professeur.examinateur.evaluer', compact('encadrement','criteres'));
    }

    public function savePPPNotes(Request $request){
      $criteres  = Input::get('criteres');
      $evaluation_id = $request->id ;
        $note = 0 ;
      foreach($criteres as $critere) {
          $note = $note+ $critere ;
      }
      $evaluation = Encadrement::findOrFail($evaluation_id);
      $evaluation->note_soutenance = $note ;
      $evaluation->note_finale = $evaluation->note + $note ;
      $evaluation->save();

      // Redirect to list Of Users
      $professeur =  Professeur::findOrFail(\Auth::guard('professeur')->id());
      $soutenances = $professeur->soutenances ;
      return view('professeur.soutenance.list',compact('soutenances'))->withSuccess('Vous Avez Attribuer la note '.$note.' au sujet :'.$evaluation->ppp->name) ;

    }
}
