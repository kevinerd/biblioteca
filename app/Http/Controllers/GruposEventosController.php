<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\GruposEventos;
use App\Http\Requests\CreateGruposEventosRequest;

class GruposEventosController extends Controller {
    public function index(){
        $grupos= DB::table('grupos_eventos')->get();

        GruposEventos::all();

        return view('grupos_eventos.index', compact('grupos'));
    }

    public function create(){
        return view('grupos_eventos.create');
    }

    public function store(CreateGruposEventosRequest $request){
        GruposEventos::create($request->all());

        return redirect()->route('grupos_eventos.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $grupo = GruposEventos::findOrFail($id);

        return view('grupos_eventos.edit', compact('grupo'));
    }

    public function update($id, CreateGruposEventosRequest $request){
        GruposEventos::findOrFail($id)->update($request->all());

        return redirect()->route('grupos_eventos.index')->with('info', 'Categoría modificada correctamente.');
    }

    public function destroy($id){
        GruposEventos::findOrFail($id)->delete();

        return redirect()->route('grupos_eventos.index');
    }
}