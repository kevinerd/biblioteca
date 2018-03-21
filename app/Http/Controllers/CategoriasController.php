<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use DB;
use App\Categoria;

class CategoriasController extends Controller{
    public function index(){
        $grupos = DB::table('grupos_categorias')->get();

        $categorias = DB::table('categorias')->get();

        Categoria::all();

        return view('categorias.index', compact('categorias', 'grupos'));
    }

    public function create(){
        $grupos = DB::table('grupos_categorias')->get(['id', 'nombre']);

        return view('categorias.create', compact('grupos'));
    }

    public function store(CreateCategoriaRequest $request){
        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);

        $grupos = DB::table('grupos_categorias')->get(['id', 'nombre']);

        return view('categorias.edit', compact('categoria', 'grupos'));
    }

    public function update(CreateCategoriaRequest $request, $id){
        Categoria::findOrFail($id)->update($request->all());

        return redirect()->route('categorias.index')->with('info', 'Categoría creada correctamente.');
    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();

        return redirect()->route('categorias.index')->with('info', 'Autor eliminado correctamente.');
    }
}
