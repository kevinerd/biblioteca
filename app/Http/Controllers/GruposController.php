<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GruposController extends Controller
{
    public function create(){
        return view('grupos.create');
    }

    public function store(Request $request){
        Grupo::create($request->all());

        return back()->with('info', 'Grupo creado correctamente.');
    }

    public function edit($id){
        $grupo = Grupo::findOrFail($id);

        return view('grupos.edit', compact('grupo'));
    }

    public function update(Request $request, $id){
        Grupo::findOrFail($id)->update($request->all());

        return redirect()
            ->route('categorias.index')
            ->with('info', 'Grupo modificado correctamente.');
    }

    public function destroy($id){
        Grupo::findOrFail($id)->delete();

        return redirect()->route('categorias.index');
    }
}
