<?php

namespace App\Http\Controllers;

use App\GruposAutores;
use App\Http\Requests\CreateGruposAutoresRequest;
use Illuminate\Support\Facades\DB;

class GruposAutoresController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $grupos= DB::table('grupos_autores')->get();

        GruposAutores::all();

        return view('grupos_autores.index', compact('grupos'));
    }

    public function create(){
        return view('grupos_autores.create');
    }

    public function store(CreateGruposAutoresRequest $request){
        GruposAutores::create($request->all());

        return redirect()->route('grupos_autores.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $grupo = GruposAutores::findOrFail($id);

        return view('grupos_autores.edit', compact('grupo'));
    }

    public function update($id, CreateGruposAutoresRequest $request){
        GruposAutores::findOrFail($id)->update($request->all());

        return redirect()->route('grupos_autores.index')->with('info', 'Categoría modificada correctamente.');
    }

    public function destroy($id){
        GruposAutores::findOrFail($id)->delete();

        return redirect()->route('grupos_autores.index');
    }
}
