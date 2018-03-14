<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use DB;

class LibrosController extends Controller {
    public function index(){
        $libros = DB::table('libros')->get();

        Libro::all();

        return view('libros.index', compact('libros'));
    }

    public function create(){
        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        return view('libros.create', compact('autores'));
    }

    public function store(Request $request){
        Libro::create($request->all());
        return back()
            ->with('info', 'Libro cargado correctamente.');
    }

    public function show($id){
        $libro = Libro::findOrFail($id);

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        return view('libros.show', compact('libro', 'autores'));
    }

    public function edit($id){
        $libro = Libro::findOrFail($id);

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        return view('libros.edit', compact('libro', 'autores'));
    }

    public function update(Request $request, $id){
        Libro::findOrFail($id)->update($request->all());

        return redirect()->route('libros.index');
    }

    public function destroy($id){
        Libro::findOrFail($id)->delete();
        return redirect()->route('libros.index');
    }

    public function getAutorId($id){
        $sql = "SELECT nombre, apellido FROM autores INNER JOIN libros ON libros.idAutor = autores.id WHERE autores.id = $id";
        return $sql;
    }
}
