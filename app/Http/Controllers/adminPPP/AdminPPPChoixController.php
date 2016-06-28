<?php

namespace App\Http\Controllers\AdminPPP;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Critere as Critere ;
use App\Models\CritereExaminateur as CritereExaminateur ;
class AdminPPPChoixController extends Controller
{
    public function indexCritere() {
               $criteres = Critere::all();
       return view('admin_ppp.critere.list',compact('criteres'));
    }

    public function getAjouterPPP(){
         return view('admin_ppp.critere.add');
    }

    public function postAddCritere(Request $request){
          $critere = new Critere ;
          $critere->nom = $request->nom ;
          $critere->note_min = $request->note_min;
          $critere->note_max = $request->note_max ;
          $critere->coefficient = $request->coefficient ;
          $critere->save();
          return redirect()->route('adminPPP.critere.list');
    }

  public function deleteCritere(Request $request){

              $critere = Critere::findOrFail($request->id);
              $critere->delete();
              return redirect()->route('adminPPP.critere.list');
  }

 public function updateCritere($id){
     $critere = Critere::findOrFail($id);
     //return $critere ;
     return view('admin_ppp.critere.update',compact('critere'));
  }

public function saveUpdateCritere(Request $request){
       $critere = Critere::findOrFail($request->id);
       $critere->nom = $request->nom ;
       $critere->note_min = $request->note_min ;
       $critere->note_max = $request->note_max;
       $critere->coefficient = $request->coefficient ;
       $critere->save();
       return redirect()->route('adminPPP.critere.list');
}

     //Get Add PPP
    public function getAjouterCritereExaminateur() {
          return view('admin_ppp.critere_examinateur.add');
     }

    //Save From Add Form
     public function postAjouterCritereExaminateur(Request $request){
          $critere = new CritereExaminateur ;
          $critere->save();
          $critere->nom = $request->nom ;
          $critere->note_min = $request->note_min ;
          $critere->note_max = $request->note_max;
          $critere->coefficient = $request->coefficient ;
          $critere->save();
          return redirect()->route('adminPPP.critere.examinateur.list');
     }

     public function indexCritereExaminateur() {
                $criteres = CritereExaminateur::all();
                return view('admin_ppp.critere_examinateur.list',compact('criteres'));
     }


     public function deleteCritereExaminateur(Request $request){
       $critere = CritereExaminateur::findOrFail($request->id);
       $critere->delete();
       return redirect()->route('adminPPP.critere.examinateur.list');
     }

     public function updateCritereExaminateur($id) {
            $critere = CritereExaminateur::findOrFail($id);
           return view('admin_ppp.critere_examinateur.update',compact('critere'));
     }

     public function saveUpdateExaminateurCritere(Request $request){
       $critere = CritereExaminateur::findOrFail($request->id);
       $critere->nom = $request->nom ;
       $critere->note_min = $request->note_min ;
       $critere->note_max = $request->note_max;
       $critere->coefficient = $request->coefficient ;
       $critere->save();
      return redirect()->route('adminPPP.critere.examinateur.list');
     }

}
