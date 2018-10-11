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
        $grupos = DB::table('grupos_libros')->get();

        return view('libros.create', compact('autores', 'grupos'));
    }

    public function store(CreateLibroRequest $request){
        Libro::create($request->all());

        return redirect()->route('libros.index')->with('info', 'Libro cargado correctamente.');
    }

    public function show($id){
        $libro = DB::table('libros')
            ->select('libros.*')
            ->join('autores', 'libros.id_autor', '=', 'autores.id')
            ->where('libros.id', '=', $id)->get();

        $autor = DB::table('autores')
            ->select('autores.nombre', 'autores.apellido', 'autores.thumb')
            ->join('libros', 'autores.id', '=', 'libros.id_autor')
            ->where('libros.id', '=', $id)->get();

        return view('libros.show', compact('libro', 'autor'));
    }

    public function edit($id){
        $libro = Libro::findOrFail($id);

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        $grupos = DB::table('grupos_libros')->get();

        return view('libros.edit', compact('libro', 'autores', 'grupos'));
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

        $autores = DB::table('autores')->get(['id', 'nombre', 'apellido']);

        $grupos = DB::table('grupos_libros')->get();

        Libro::all();

        return view('site.libros', compact('libros', 'autores', 'grupos'));
    }

    public function siteShow($id){
        $libro = DB::table('libros')
            ->select('libros.*')
            ->join('autores', 'libros.id_autor', '=', 'autores.id')
            ->where('libros.id', '=', $id)->get();

        $autor = DB::table('autores')
            ->select('autores.nombre', 'autores.apellido', 'autores.thumb')
            ->join('libros', 'autores.id', '=', 'libros.id_autor')
            ->where('libros.id', '=', $id)->get();

        return view('site.libro', compact('libro', 'autor'));
    }
}
