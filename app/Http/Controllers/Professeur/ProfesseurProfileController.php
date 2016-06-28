<?php

namespace App\Http\Controllers\Professeur;

use Illuminate\Http\Request;
use App\Models\Professeur as Professeur ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfesseurProfileController extends Controller
{
    public function getUpdateProfile() {
        $professeur_id = \Auth::guard('professeur')->id() ;
        $professeur = Professeur::findOrFail($professeur_id);
        return view('professeur.profile.update', compact('professeur'));
    }

    public function updateProfile(Request $request) {

      $professeur_id = \Auth::guard('professeur')->id() ;
      $professeur = Professeur::findOrFail($professeur_id);
      if(isset($request->email)) {
        $professeur->email = $request->email ;
      }
      if(isset($request->password)) {
       $professeur->password = bcrypt($request->password) ;
      }
      $professeur->save() ;
     return redirect()->route('professeur.edit');
    }
}
