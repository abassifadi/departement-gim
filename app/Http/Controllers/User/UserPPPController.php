<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PPP as PPP ;
use App\Models\Choix as Choix ;

class UserPPPController extends Controller
{
    function __construct() {
   $this->middleware('auth');
   }


    public function listPPP() {

          $filiere_id = \Auth::user()->filiere_id ;
          $ppp_list = PPP::whereRaw('filiere_id = ?',array($filiere_id))->get() ;
           return view('user.ppp.list' , compact('ppp_list')) ;
    }

    public function showPPP($ppp_id) {
       $ppp = PPP::findOrFail($ppp_id) ;
      return view('user.ppp.details',compact('ppp'));
    }

    public function getChoixPPP() {
      $filiere_id = \Auth::user()->filiere_id ;
      $ppp_list = PPP::whereRaw('filiere_id = ?',array($filiere_id))->lists('name' ,'id') ;
         return view('user.ppp.choix', compact('ppp_list'));
    }

    public function postChoixPPP(Request $request){

            //CHecking for exisitng choices
            $choix_1 = Choix::whereRaw('binom_id = ?',array(\Auth::user()->binome->id ))->whereRaw('rang_choix = ?',array(1))->first();
            $choix_2 = Choix::whereRaw('binom_id = ?',array(\Auth::user()->binome->id ))->whereRaw('rang_choix = ?',array(2))->first();
            $choix_3 = Choix::whereRaw('binom_id = ?',array(\Auth::user()->binome->id ))->whereRaw('rang_choix = ?',array(3))->first();
            $choix_4 = Choix::whereRaw('binom_id = ?',array(\Auth::user()->binome->id ))->whereRaw('rang_choix = ?',array(4))->first();



             if(is_null($choix_1)) {
              $choix_1 = new Choix ;
             }

             $choix_1->binom_id = \Auth::user()->binome->id ;
             $choix_1->ppp_id = $request->choix1 ;
             $choix_1->rang_choix = 1 ;
             $choix_1->save();
            if(is_null($choix_2)) {
              $choix_2 = new Choix ;
            }
             $choix_2->binom_id = \Auth::user()->binome->id ;
             $choix_2->ppp_id = $request->choix2 ;
             $choix_2->rang_choix = 2 ;
             $choix_2->save();
             if(is_null($choix_3)) {
               $choix_3 = new Choix ;
             }

             $choix_3->binom_id = \Auth::user()->binome->id ;
             $choix_3->ppp_id = $request->choix3 ;
             $choix_3->rang_choix = 3 ;
             $choix_3->save();

             if(is_null($choix_4)) {
                $choix_4 = new Choix ;
             }
             $choix_4->binom_id = \Auth::user()->binome->id ;
             $choix_4->ppp_id = $request->choix4 ;
             $choix_4->rang_choix = 4 ;
             $choix_4->save();

             return 'Choix Sauvegerdé';

    }



}
