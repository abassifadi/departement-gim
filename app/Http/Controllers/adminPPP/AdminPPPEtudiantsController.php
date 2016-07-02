<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Filiere as Filiere ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailingServiceController as Mailing ;
use App\User;


/**
 * Handles Student Accounts.
 * CRUD
 */
class AdminPPPEtudiantsController extends Controller
{
  /**
   * Adding a new Student.
   *
   */
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
       $user->password = bcrypt($request->password);
       $user->save();
       //Sending an email notification to user
       $subject = 'Account Created' ;
       $message = 'An Accout Was Created for you login : '.$user->login.' password '.$request->password ;
        Mailing::notifyUserWithMail($subject , $message , $user->email);
        return redirect()->route('AdminPPP.etudiant.list');
    }

    /**
     *Returns The list of All Students Accounts.
     *
     */
    public function listEtudiant(){

         $etudiants = User::all();
        return view('admin_ppp.etudiants.list', compact('etudiants'));
    }

    /**
     * Deleting an existing Student.
     *
     */

    public function deleteEtudiant(Request $request){

         $etudiant = User::findOrFail($request->id);
         $etudiant->delete();
         return redirect()->route('AdminPPP.etudiant.list');
    }

    /**
     * Updating an existing student account.
     *
     */
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
