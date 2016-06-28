<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Models\Binomage as Binome ;

class UserBinomageController extends Controller
{
    public function choixBinomage() {

            $users = User::whereRaw('filiere_id = ?',array(\Auth::user()->filiere_id))->get()->lists('full_name','id') ;
            return view('user.binomage.choix', compact('users')) ;
    }

    public function saveChoixBinomage(Request $request) {
      $binom1_id = $request->member1 ;
      $binom2_id = $request->member2 ;
      $binom3_id = $request->member3 ;


      //Retrieving User From Database
      $binom1 = User::findOrFail($binom1_id) ;
      $binom2 = User::findOrFail($binom2_id) ;

      //Test NULL Value

      if(($binom1->binom_id == 0)&& ($binom2->binom_id ==0)) {

        //Checking if Binom has been affected or Not to Database
        $binomage = new Binome ;
        $binomage->filiere_id = \Auth::user()->filiere_id ;
        $binomage->save();

        $binom1->binom_id = $binomage->id ;
        $binom2->binom_id = $binomage->id ;

        if($binom3_id != "") {
          $binom3 = User::findOrFail($binom3_id) ;
          if($binom3->binom_id==0) {
            $binom3->binom_id = $binomage->id ;
            //Saving Moyenne Binome
            $binom1->save() ;
            $binom2->save() ;
            $binom3->save();
            $binomage->moyenne = ($binom1->moyenne + $binom2->moyenne+ $binom3->moyenne)/3 ;
            $binomage->save();
            return redirect()->route('binom.list');
          }
          else {
            $users = User::whereRaw('filiere_id = ?',array(\Auth::user()->filiere_id))->get()->lists('full_name','id') ;
            return view('user.binomage.choix', compact('users'))->withErrors(['affected'=>'Un Etudiant Selectionne est déja affecte']) ;
          }

        }

        //Saving Moyenne Binome
        $binom1->save() ;
        $binom2->save() ;
        $binomage->moyenne = ($binom1->moyenne + $binom2->moyenne)/2 ;
        $binomage->save();
        //------------------

      }

      else {
        $users = User::whereRaw('filiere_id = ?',array(\Auth::user()->filiere_id))->get()->lists('full_name','id') ;
        return view('user.binomage.choix', compact('users'))->withErrors(['affected'=>'Un Etudiant Selectionne est déja affecte']) ;
      }

      return redirect()->route('binom.list');

    }


    public function listBinome(){
         $binomes = Binome::whereRaw('filiere_id = ?',array(\Auth::user()->filiere_id))->get();
         return view('user.binomage.list', compact('binomes')) ;

    }
}
