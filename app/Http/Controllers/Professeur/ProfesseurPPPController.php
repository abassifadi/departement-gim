<?php

namespace App\Http\Controllers\Professeur;
use Validator ;
use Illuminate\Http\Request;
use App\Models\PPP as PPP ;
use App\User as User ;
use App\Models\Filiere as Filiere ;
use App\Models\Categorie as Categorie ;
use App\Models\Categorisation as Categorisation ;
use App\Http\Controllers\MailingServiceController as Mailing ;
use App\Models\Encadrement as Encadrement ;
use App\Models\Soutenance as Soutenance ;
use App\Models\Professeur as Professeur ;
use App\Models\Critere as Critere ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class ProfesseurPPPController extends Controller
{
      /*******************
        Return Adding PPP Pour Professeur
      ***********************/

    public function getAddPPP() {
         $ppps = Filiere::lists('nom','id');
          $categories = Categorie::all() ;
          return view('professeur.ppp.add',compact('ppps','categories')) ;
    }

/************************************
**** Register PPP To Database********
**************************************/

    public function postAddPPP(Request $request) {

       $ppp = new PPP ;
       $ppp->name = $request->nom ;
       $ppp->filiere_id = $request->filiere_id ;
       $ppp->description = $request->description ;
       $ppp->professeur_id = \Auth::guard('professeur')->id() ;
       $ppp->save() ;
       $categories_checked = Input::get('categories');
        if(is_array($categories_checked))
        {

           foreach($categories_checked as $categorie_checked) {
                  $categorisation = new Categorisation  ;
                  $categorisation->categorie_id = $categorie_checked ;
                  $categorisation->ppp_id = $ppp->id ;
                  $categorisation->save() ;
           }
       }
        return redirect()->route('professeur.welcome');
    }

    /************************************
    **** List PPP To Of Current User********
    **************************************/

   public function listMyPPP() {
        $professeur_id = \Auth::guard('professeur')->id() ;
        $ppps = PPP::whereRaw('professeur_id = ?',array($professeur_id))->get();
        return view('professeur.ppp.list',compact('ppps')) ;
   }

   /************************************
   ***********      Edit PPP    ********
   **************************************/

   public function editPPP($id) {
        $ppp = PPP::findOrFail($id);
        return view('professeur.ppp.update',compact('ppp'));
   }



   public function updatePPP(Request $request) {
          $ppp = PPP::findOrFail($request->id) ;
          $ppp->name = $request->name ;
          $ppp->description = $request->description ;
          $ppp->save() ;
          return redirect()->route('professeur.ppp.list');
   }

   public function PPPEtudiantmail($ppp_id){

     $encadrement = Encadrement::whereRaw('ppp_id = ?',array($ppp_id))
                      ->whereRaw('professeur_id = ?',array(\Auth::guard('professeur')->id()))
                     ->first();

     $validator = Validator::make([], []);
    if (is_null($encadrement)) {
       $validator->errors()->add('ppp_not_affected', 'Le Sujet n est pas affecte a aucun binome');
       return redirect('profeseur/ppp/list')
                       ->withErrors($validator)
                       ->withInput();
                 }

       $etudiants = $encadrement->binome->etudiants ;
        return view('professeur.ppp.contact_etudiant', compact('etudiants')) ;

   }


   public function SendEtudiantmail(Request $request) {
       $subject = $request->sujet ;
       $message = $request->message ;
       $etudiants = Input::get('etudiants');
       foreach ($etudiants as $etudiant_id) {
         $etudiant = User::find($etudiant_id);
         Mailing::notifyUserWithMail($subject , $message , $etudiant->email);
       }

       $professeur_id = \Auth::guard('professeur')->id() ;
       $ppps = PPP::whereRaw('professeur_id = ?',array($professeur_id))->get();
       return view('professeur.ppp.list',compact('ppps'))->withSuccess('Votre email a été envoyé') ;


   }

   public function getEvaluerPPP($ppp_id){
      $encadrement = Encadrement::whereRaw('ppp_id = ?',array($ppp_id))
                       ->whereRaw('professeur_id = ?',array(\Auth::guard('professeur')->id()))
                      ->first();
      $criteres = Critere::all();
       $validator = Validator::make([], []);
       if (is_null($encadrement)) {
    $validator->errors()->add('ppp_not_affected', 'Le Sujet n est pas affecte a aucun binome');
  return redirect('profeseur/ppp/list')
         ->withErrors($validator)
         ->withInput();
   }
        return view('professeur.ppp.evaluer',compact('encadrement','criteres')) ;
   }

   public function postEvaluerPPP(Request $request){
          $criteres  = Input::get('criteres');
          $evaluation_id = $request->id ;
            $note = 0 ;
          foreach($criteres as $critere) {
              $note = $note+ $critere ;
          }
          $evaluation = Encadrement::findOrFail($evaluation_id);
          $evaluation->note = $note ;
          $evaluation->note_finale = $evaluation->note_soutenance + $note;
          $evaluation->save();

          $professeur_id = \Auth::guard('professeur')->id() ;
          $ppps = PPP::whereRaw('professeur_id = ?',array($professeur_id))->get();
          return view('professeur.ppp.list',compact('ppps'))->withSuccess('Vous Avez Attribuer la note '.$note.' au sujet :'.$evaluation->ppp->name) ;

   }


   public function getSoutenancePPP($id) {

     $encadrement = Encadrement::whereRaw('ppp_id = ?',array($id))
                      ->whereRaw('professeur_id = ?',array(\Auth::guard('professeur')->id()))
                     ->first();
     $criteres = Critere::all();
      $validator = Validator::make([], []);
      if (is_null($encadrement)) {
      $validator->errors()->add('ppp_not_affected', 'Le Sujet n est pas affecte a aucun binome');
      return redirect('profeseur/ppp/list')
      ->withErrors($validator)
      ->withInput();
       }
        $professeurs = Professeur::all()->lists('full_name','id');
        $ppp = PPP::findOrFail($id);

        //Searching for Existing Soutenance
        $soutenance = Soutenance::whereRaw('encadrement_id = ?',array($ppp->encadrement_id))->first();
        if(is_null($soutenance))  {
            $soutenance = new Soutenance ;
            $soutenance->encadrement_id = $ppp->encadrement->id ;
            $soutenance->save();
            $ppp->encadrement->soutenance_id = $soutenance->id ;
            $ppp->encadrement->save() ;
            $ppp->save();
            return  view('professeur.soutenance.select',compact('soutenance','professeurs')) ;
        }


        //Finding Exisitng Model
        $soutenance = Soutenance::whereRaw('encadrement_id = ?',array($ppp->encadrement_id))->first();
        return  view('professeur.soutenance.select',compact('soutenance','professeurs')) ;
   }


   public function postSoutenancePPP(Request $request) {
              $soutenance = Soutenance::findOrFail($request->id);
              $soutenance->professeur_id = $request->professeur_id ;
              $soutenance->date = $request->date;
              $soutenance->salle = $request->salle ;
              $soutenance->save();
              return redirect()->route('professeur.ppp.list');
   }

   public function mesSoutenances() {
     $professeur =  Professeur::findOrFail(\Auth::guard('professeur')->id());
     $soutenances = $professeur->soutenances ;
     return view('professeur.soutenance.list',compact('soutenances'));
   }


}
