<?php

namespace App\Http\Controllers\adminPPP;

use Illuminate\Http\Request;
use App\Models\Module as Module ;
use App\Models\Filiere as Filiere ;
use App\Models\Professeur as Professeur ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('admin_ppp.modules.list',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $filieres = Filiere::lists('nom','id');
         $professeurs = Professeur::all()->lists('full_name','id');
        return view('admin_ppp.modules.add',compact('filieres','professeurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $inputs = Input::all();

      $module = Module::create($inputs);
      $module->professeur_id = $request->professeur_id;
      $module->save();
      return redirect()->route('admin_module.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $module = Module::findOrFail($id);
      $filieres = Filiere::lists('nom','id');
      $professeurs = Professeur::all()->lists('full_name','id');
      return view('admin_ppp.modules.update', compact('module','filieres','professeurs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $module = Module::findOrFail($id);
      $module->nom = Input::get('nom');
      $module->description = Input::get('description');
      $module->coeficient = Input::get('coeficient');
      $module->planning = Input::get('planning');
      $module->filiere_id = Input::get('filiere_id');
      //$module->professeur_id = Input::get('professeur_id');
      $module->professeur_id = 1;
      $module->save();
      return redirect()->route('admin_module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $module = Module::findOrFail($id);
      $module->delete();
      return redirect()->route('admin_module.index');
    }
}
