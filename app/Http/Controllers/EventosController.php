<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventosRequest;
use DB;
use App\Evento;

class EventosController extends Controller{
    public function index(){
        $eventos = DB::table('eventos')->get();

        Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    public function create(){
        $categorias = DB::table('categorias')->where('id_grupo', '5')->get();

        return view('eventos.create', compact('categorias'));
    }

    public function store(CreateEventosRequest $request){
        Evento::create($request->all());

        return redirect()->route('eventos.index')->with('info', 'Evento creado correctamente.');
    }

    public function edit($id){
        $evento = Evento::findOrFail($id);

        $categorias = DB::table('categorias')->where('id_grupo', '5')->get();

        return view('eventos.edit', compact('evento', 'categorias'));
    }

    public function update(CreateEventosRequest $request, $id){
        Evento::findOrFail($id)->update($request->all());

        return redirect()->route('eventos.index')->with('info', 'Evento modificado correctamente.');
    }

    public function show($id){
        $evento = Evento::findOrFail($id);

        return view('eventos.show', compact('evento'));
    }

    public function destroy($id){
        Evento::findOrFail($id)->delete();

        return redirect()->route('eventos.index')->with('info', 'Evento eliminado correctamente.');
    }
}
