<?php

namespace App\Http\Controllers;

use App\Taller;
use App\Http\Requests\CreateTalleresRequest;
use DB;

class TalleresController extends Controller {
    public function __construct(){
        $this->middleware('auth')->except('site', 'siteShow');
        $this->middleware('admin')->except('site', 'siteShow');
    }

    public function index() {
        $talleres = DB::table('talleres')->get();

        Taller::all();

        return view('talleres.index', compact('talleres'));
    }

    public function create() {
        $talleres = DB::table('talleres')->get();
        $grupos = DB::table('grupos_talleres')->get();

        return view('talleres.create', compact('talleres', 'grupos'));
    }

    public function store(CreateTalleresRequest $request) {
        Taller::create($request->all());

        return redirect()->route('talleres.index')->with('info', 'Taller cargado correctamente.');
    }

    public function show($id) {
        $taller = DB::table('talleres')->get();

        return view('talleres.show', compact('taller'));
    }

    public function edit($id) {
        $taller = Taller::findOrFail($id);

        return view('talleres.edit', compact('taller'));
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
