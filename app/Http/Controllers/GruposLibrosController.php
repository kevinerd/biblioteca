<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGruposLibrosRequest;
use Illuminate\Http\Request;
use App\GruposLibros;
use Illuminate\Support\Facades\DB;

class GruposLibrosController extends Controller{
    public function index(){
        $grupos= DB::table('grupos_libros')->get();

        GruposLibros::all();

        return view('grupos_libros.index', compact('grupos'));
    }

    public function create(){
        return view('grupos_libros.create');
    }

    public function store(CreateGruposLibrosRequest $request){
        GruposLibros::create($request->all());
        return redirect()->route('grupos_libros.index')->with('info', 'Categoría creada correctamente.');
    }

    public function edit($id){
        $grupo = GruposLibros::findOrFail($id);

        return view('grupos_libros.edit', compact('grupo'));
    }

    public function update($id, CreateGruposLibrosRequest $request){
        GruposLibros::findOrFail($id)->update($request->all());

        return redirect()->route('grupos_libros.index')->with('info', 'Categoría modificada correctamente.');
    }

    public function destroy($id){
        GruposLibros::findOrFail($id)->delete();

        return redirect()->route('grupos_libros.index');
    }
}
