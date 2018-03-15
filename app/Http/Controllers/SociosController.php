<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;
use DB;

class SociosController extends Controller
{
    public function index(){
        $socios= DB::table('socios')->get();

        Socio::all();

        return view('socios.index', compact('socios'));
    }

    public function create(){
        return view('socios.create');
    }

    public function store(Request $request){
        Socio::create($request->all());
        return back()->with('info', 'Socio registrado correctamente.');
    }

    public function show($id){
        $socio = Socio::findOrFail($id);

        return view('socios.show', compact('socio'));
    }

    public function edit($id){
        $socio = Socio::findOrFail($id);

        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, $id){
        Socio::findOrFail($id)->update($request->all());

        return redirect()->route('socios.index')->with('info', 'Socio modificado correctamente.');
    }

    public function destroy($id){
        Socio::findOrFail($id)->destroy();
        return redirect()->route('socios.index');
    }

}
