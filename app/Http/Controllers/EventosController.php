<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Evento;

class EventosController extends Controller
{
    public function index(){
        $eventos = DB::table('eventos')->get();

        Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    public function create(){
        return view('eventos.create');
    }

    public function store(Request $request){
        Evento::create($request->all());
        return back()->with('info', 'Evento creado correctamente.');
    }

    public function edit($id){
        $evento = Evento::findOrFail($id);

        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id){
        Evento::findOrFail($id)->update($request->all());

        return redirect()->route('eventos.index');
    }

    public function show($id){
        $evento = Evento::findOrFail($id);

        return view('eventos.show', compact('evento'));
    }

    public function destroy($id){
        Evento::findOrFail($id)->delete();

        return redirect()->route('eventos.index');
    }
}
