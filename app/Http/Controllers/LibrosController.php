<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLibroRequest;
use App\Libro;
use DB;

class LibrosController extends Controller {
    public function index(){
        $libros = DB::table('libros')->get();

        Libro::all();
        if(isset($_SESSION['usuario'])){
            return view('libros.index_admin', compact('libros'));
        }
        else{
            return view('libros.index', compact('libros'));
        }
    }

    public function create(){
        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        $categorias = DB::table('categorias')->where('id_grupo', '1')->get();

        return view('libros.create', compact('autores', 'categorias'));
    }

    public function store(CreateLibroRequest $request){
        Libro::create($request->all());

        return redirect()->route('libros.index')->with('info', 'Libro cargado correctamente.');
    }

    public function show($id){
        $libro = Libro::findOrFail($id);

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        return view('libros.show', compact('libro', 'autores'));
    }

    public function edit($id){
        $libro = Libro::findOrFail($id);

        $categorias = DB::table('categorias')->where('id_grupo', '1')->get();

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        return view('libros.edit', compact('libro', 'autores', 'categorias'));
    }

    public function update(CreateLibroRequest $request, $id){
        Libro::findOrFail($id)->update($request->all());

        return redirect()->route('libros.index')->with('info', 'Libro modificado correctamente.');
    }

    public function destroy($id){
        Libro::findOrFail($id)->delete();

        return redirect()->route('libros.index');
    }

    /*public function getAutorId($id){
        $sql = "SELECT nombre, apellido FROM autores INNER JOIN libros ON libros.idAutor = autores.id WHERE autores.id = $id";
        return $sql;
    }*/
}
