<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Critere as Critere ;
use App\Models\CritereExaminateur as CritereExaminateur ;


/**
 * Handles The Management Of Criteria and judgement system.
 * CRUD
 */
class AdminPPPCritereExaminateurController extends Controller
{

  /**
   * Returns Adding a new criteria form.
   */

 public function getAjouterCritereExaminateur() {
       return view('admin_ppp.critere_examinateur.add');
  }

  /**
   * Retreiving data form and adding a new criteria to database.
   */
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

  /**
   * Returning list of all criterias.
   */
  public function indexCritereExaminateur() {
             $criteres = CritereExaminateur::all();
             return view('admin_ppp.critere_examinateur.list',compact('criteres'));
  }

  /**
   * Deleting criteria from database.
   */
  public function deleteCritereExaminateur(Request $request){
    $critere = CritereExaminateur::findOrFail($request->id);
    $critere->delete();
    return redirect()->route('adminPPP.critere.examinateur.list');
  }

  /**
   * Updating an existing criteria.
   */
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
