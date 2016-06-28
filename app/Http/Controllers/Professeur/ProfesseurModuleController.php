<?php

namespace App\Http\Controllers\professeur;

use Illuminate\Http\Request;
use App\Models\Module as Module ;
use App\Models\Filiere as Filiere ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProfesseurModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::whereRaw('professeur_id = ?',array(\Auth::guard('professeur')->id()))->get();
        return view('professeur.module.list',compact('modules')) ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $filieres = Filiere::lists('nom','id');
          return view('professeur.module.add',compact('filieres'));
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
      $module->professeur_id = \Auth::guard('professeur')->id() ;
      $module->save();

        return redirect()->route('module.index');

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
        return view('professeur.module.update', compact('module','filieres'));
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
        $module->save();
        return redirect()->route('module.index');




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
        return redirect()->route('module.index');
    }
}
