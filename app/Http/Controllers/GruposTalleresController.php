<?php

namespace App\Http\Controllers;

use App\GruposTalleres;
use DB;
use App\Http\Requests\CreateGruposTalleresRequest;

class GruposTalleresController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $grupos= DB::table('grupos_talleres')->get();

        GruposTalleres::all();

        return view('grupos_talleres.index', compact('grupos'));
    }

    public function create(){
        return view('grupos_talleres.create');
    }

    public function store(CreateGruposTalleresRequest $request){
        GruposTalleres::create($request->all());

        return redirect()->route('grupos_talleres.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $grupo = GruposTalleres::findOrFail($id);

        return view('grupos_talleres.edit', compact('grupo'));
    }

    public function update($id, CreateGruposTalleresRequest $request){
        GruposTalleres::findOrFail($id)->update($request->all());

        return redirect()->route('grupos_talleres.index')->with('info', 'Categoría modificada correctamente.');
    }

    public function destroy($id){
        GruposTalleres::findOrFail($id)->delete();

        return redirect()->route('grupos_talleres.index');
    }
}