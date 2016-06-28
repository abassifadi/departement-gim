<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Filiere as Filiere ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailingServiceController as Mailing ;
use App\User;
class AdminPPPEtudiantsController extends Controller
{
    public function getAddEtudiant(){
      $filieres = Filiere::lists('nom','id');
      return view('admin_ppp.etudiants.add', compact('filieres'));
    }

    public function saveEtudiant(Request $request) {
       $user = new User ;
       $user->nom = $request->nom ;
       $user->prenom = $request->prenom ;
       $user->cin = $request->cin ;
       $user->num_inscri = $request->num_inscri ;
       $user->filiere_id = $request->filiere_id ;
       $user->moyenne = $request->moyenne ;
       $user->email = $request->email ;
       $user->login = $request->login ;
       $user->binom_id = 0;
       //$user->encadrement_id = 0 ;
       //$user->option_id = 0 ;
       //return bcrypt($request->password) ;
       $user->password = bcrypt($request->password);
       $user->save();
       $subject = 'Account Created' ;
       $message = 'An Accout Was Created for you login : '.$user->login.' password '.$request->password ;
        Mailing::notifyUserWithMail($subject , $message , $user->email);
        return redirect()->route('AdminPPP.etudiant.list');
    }

    public function listEtudiant(){

         $etudiants = User::all();
        return view('admin_ppp.etudiants.list', compact('etudiants'));
    }

    public function deleteEtudiant(Request $request){

         $etudiant = User::findOrFail($request->id);
         $etudiant->delete();
         return redirect()->route('AdminPPP.etudiant.list');
    }

    public function getUpdateEtudiant($id){
            $etudiant = User::findOrFail($id);
              $filieres = Filiere::lists('nom','id');
            return view('admin_ppp.etudiants.update',compact('etudiant','filieres')) ;
    }

    public function postUpdateEtudiant(Request $request){
              $user = User::findOrFail($request->id);
              $user->nom = $request->nom ;
              $user->prenom = $request->prenom ;
              $user->cin = $request->cin ;
              $user->num_inscri = $request->num_inscri ;
              $user->filiere_id = $request->filiere_id ;
              $user->moyenne = $request->moyenne ;
              $user->email = $request->email ;
              $user->login = $request->login ;
              //return bcrypt($request->password) ;
              $user->password = bcrypt($request->password);
              $user->save();
               return redirect()->route('AdminPPP.etudiant.list');
    }
}
