<?php

namespace App\Http\Controllers;

use App\GruposSocios;
use DB;
use App\Http\Requests\CreateGruposSociosRequest;

class GruposSociosController extends Controller {
    public function index(){
        $grupos= DB::table('grupos_socios')->get();

        GruposSocios::all();

        return view('grupos_socios.index', compact('grupos'));
    }

    public function create(){
        return view('grupos_socios.create');
    }

    public function store(CreateGruposSociosRequest $request){
        GruposSocios::create($request->all());

        return redirect()->route('grupos_socios.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $grupo = GruposSocios::findOrFail($id);

        return view('grupos_socios.edit', compact('grupo'));
    }

    public function update($id, CreateGruposSociosRequest $request){
        GruposSocios::findOrFail($id)->update($request->all());

        return redirect()->route('grupos_socios.index')->with('info', 'Categoría modificada correctamente.');
    }

    public function destroy($id){
        GruposSocios::findOrFail($id)->delete();

        return redirect()->route('grupos_socios.index');
    }
}