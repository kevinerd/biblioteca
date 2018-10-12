<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\GruposSocios;
use App\Http\Requests\CreateSocioRequest;
use App\Socio;
use DB;

class SociosController extends Controller{
    public function index(){
        $socios= DB::table('socios')->get();

        Socio::all();

        return view('socios.index', compact('socios'));
    }

    public function create(){
        $categorias = DB::table('grupos_socios')->get();

        return view('socios.create', compact('categorias'));
    }

    public function store(CreateSocioRequest $request){
        Socio::create($request->all());

        return redirect()->route('socios.index')->with('info', 'Socio registrado correctamente.');
    }

    public function show($id){
        $socio = Socio::findOrFail($id);
        $prestamos = DB::table('prestamos')
            ->join('socios', 'prestamos.id_socio', '=', 'socios.id')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->where('prestamos.id_socio', '=', $id)
            ->get(['prestamos.*','libros.titulo']);

        return view('socios.show', compact('socio', 'prestamos'));
    }

    public function edit($id){
        $socio = Socio::findOrFail($id);

        $categorias = DB::table('grupos_socios')->get();

        return view('socios.edit', compact('socio', 'categorias'));
    }

    public function update(CreateSocioRequest $request, $id){
        Socio::findOrFail($id)->update($request->all());

        return redirect()->route('socios.index')->with('info', 'Socio modificado correctamente.');
    }

    public function destroy($id){
        Socio::findOrFail($id)->delete();

        return redirect()->route('socios.index');
    }

}
