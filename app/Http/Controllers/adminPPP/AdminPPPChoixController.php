<?php

namespace App\Http\Controllers\AdminPPP;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Critere as Critere ;
use App\Models\CritereExaminateur as CritereExaminateur ;

/**
 * Handles Evaluation Criteria.
 * CRUD
 */

class AdminPPPChoixController extends Controller
{
  /**
   * Returns the list of exisitng criteria.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

    public function indexCritere() {
               $criteres = Critere::all();
       return view('admin_ppp.critere.list',compact('criteres'));
    }


    /**
     * Returns the form to insert new Criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAjouterPPP(){
         return view('admin_ppp.critere.add');
    }

    /**
     * Save The Created Criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAddCritere(Request $request){
          $critere = new Critere ;
          $critere->nom = $request->nom ;
          $critere->note_min = $request->note_min;
          $critere->note_max = $request->note_max ;
          $critere->coefficient = $request->coefficient ;
          $critere->save();
          return redirect()->route('adminPPP.critere.list');
    }

    /**
     * Delete a Criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function deleteCritere(Request $request){

              $critere = Critere::findOrFail($request->id);
              $critere->delete();
              return redirect()->route('adminPPP.critere.list');
  }

  /**
   * Show Form To Update criteria.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
 public function updateCritere($id){
     $critere = Critere::findOrFail($id);
     //return $critere ;
     return view('admin_ppp.critere.update',compact('critere'));
  }
  /**
   * Save All the changes.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
public function saveUpdateCritere(Request $request){
       $critere = Critere::findOrFail($request->id);
       $critere->nom = $request->nom ;
       $critere->note_min = $request->note_min ;
       $critere->note_max = $request->note_max;
       $critere->coefficient = $request->coefficient ;
       $critere->save();
       return redirect()->route('adminPPP.critere.list');
}

  
}
