<?php

namespace App\Http\Controllers;

use App\Categoria;
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

        return view('socios.show', compact('socio'));
    }

    public function edit($id){
        $socio = Socio::findOrFail($id);

        $categorias = Categoria::pluck('nombre', 'id');

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
