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
        $request->file('portada')->store('libros');
        return redirect()->route('libros.index')->with('info', 'Libro cargado correctamente.');
    }

    public function show($id){
        $libro = DB::table('libros')
            ->select('libros.*', 'autores.nombre', 'autores.apellido')
            ->join('autores', 'libros.idAutor', '=', 'autores.id')
            ->where('libros.id', '=', $id)->get();
        /*$libro = Libro::findOrFail($id)->join()->get();*/

        return view('libros.show', compact('libro'));
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

    public function site(){
        $libros = DB::table('libros')->get();

        Libro::all();

        return view('site.libros', compact('libros'));
    }

    public function siteShow($id){
        $libro = DB::table('libros')
            ->select('libros.*', 'autores.nombre', 'autores.apellido')
            ->join('autores', 'libros.idAutor', '=', 'autores.id')
            ->where('libros.id', '=', $id)->get();

        return view('site.libro', compact('libro'));
    }
}
