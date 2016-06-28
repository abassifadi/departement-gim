<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Professeur as Professeur;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminPPPProfesseurController extends Controller
{

    public function getListProfesseur(){
      $professeurs = Professeur::all();
       return view('admin_ppp.professeur.list',compact('professeurs'));
    }


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

    public function deleteProfesseur(Request $request) {
       $professeur = Professeur::findOrFail($request->id);
       $professeur->delete();
       return redirect()->route('AdminPPP.professeur.list.get');
    }

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
