<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categoria;

class CategoriasController extends Controller
{
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

    public function store(Request $request){
        Categoria::create($request->all());
        return back()->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id){
        Categoria::findOrFail($id)->update($request->all());

        return redirect()->route('categorias.index');
    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();

        return redirect()->route('categorias.index');
    }
}
