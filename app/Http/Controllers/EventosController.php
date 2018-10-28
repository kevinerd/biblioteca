<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventosRequest;
use DB;
use App\Evento;

class EventosController extends Controller{
    public function __construct(){
        $this->middleware('auth')->except('site', 'siteShow');
        $this->middleware('admin')->except('site', 'siteShow');
    }

    public function index(){
        $eventos = DB::table('eventos')->get();

        Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    public function create(){
        $grupos = DB::table('grupos_eventos')->get();

        return view('eventos.create', compact('grupos'));
    }

    public function store(CreateEventosRequest $request){
        Evento::create($request->all());

        return redirect()->route('eventos.index')->with('info', 'Evento creado correctamente.');
    }

    public function edit($id){
        $evento = Evento::findOrFail($id);

        $grupos = DB::table('grupos_eventos')->get();

        /*$evento->fecha = implode( '/', array_reverse( explode( '-', $evento->fecha ) ) ) ;*/

        return view('eventos.edit', compact('evento', 'grupos'));
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

    public function site(){
        $eventos = DB::table('eventos')->get();

        Evento::all();

        return view('site.eventos', compact('eventos'));
    }

    public function siteShow($id){
        $evento = DB::table('eventos')
            ->where('eventos.id', '=', $id)->get();

        return view('site.evento', compact('evento'));
    }
}
