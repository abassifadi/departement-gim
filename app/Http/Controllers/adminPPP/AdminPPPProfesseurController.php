<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Professeur as Professeur;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Handles Professor Accounts.
 * - CRUD
 */
class AdminPPPProfesseurController extends Controller
{

  /**
   * Returns the list of all professors.
   *
   */
    public function getListProfesseur(){
      $professeurs = Professeur::all();
       return view('admin_ppp.professeur.list',compact('professeurs'));
    }

    /**
     * Adding a new Professor.
     *
     */
    public function getAddProfesseur(){

        $professeurs = Professeur::all();
        return view('admin_ppp.professeur.add',compact('professeurs'));
    }

    public function saveProfesseur(Request $request){
         $professeur = new Professeur ;
         $professeur->nom = $request->nom ;
         $professeur->prenom = $request->prenom ;
         $professeur->immatricule = $request->immatricule ;
         $professeur->email = $request->email ;
         $professeur->telephone = $request->telephone ;
         $professeur->login = $request->login ;
         $professeur->password = bcrypt($request->password) ;
         $professeur->save();
         return redirect()->route('AdminPPP.professeur.list.get');
    }

    /**
     * Delete Professor Account.
     *
     */
    public function deleteProfesseur(Request $request) {
       $professeur = Professeur::findOrFail($request->id);
       $professeur->delete();
       return redirect()->route('AdminPPP.professeur.list.get');
    }

    /**
     * Updating Professor Accounts.
     *
     */
    public function getUpdateProfesseur($id){

         $professeur = Professeur::findOrFail($id);
         return view('admin_ppp.professeur.update',compact('professeur'));
    }

  public function postUpdateProfesseur(Request $request) {
            $professeur = Professeur::findOrFail($request->id);
            $professeur->nom = $request->nom ;
            $professeur->prenom = $request->prenom ;
            $professeur->immatricule = $request->immatricule ;
            $professeur->email = $request->email ;
            $professeur->telephone = $request->telephone ;
            $professeur->login = $request->login ;
            $professeur->password = bcrypt($request->password) ;
            $professeur->save();
            return redirect()->route('AdminPPP.professeur.list.get');
            return $professeur ;

  }

}
