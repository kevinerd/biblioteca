<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamoRequest;
use App\Prestamo;
use DB;

class PrestamosController extends Controller {
    public function index(){
        $prestamos = DB::table('prestamos')
            ->join('socios', 'prestamos.id_socio', '=', 'socios.id')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->get([
                'prestamos.*', 'socios.nombre',
                'socios.apellido', 'libros.titulo'
            ]);

        Prestamo::all();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create(){
        $libros = DB::table('libros')->get(['id', 'titulo', 'id_autor']);
        $socios = DB::table('socios')->get(['id', 'nombre', 'apellido', 'documento']);

        return view('prestamos.create', compact('libros', 'socios'));
    }

    public function store(CreatePrestamoRequest $request){
        Prestamo::create($request->all());

        return redirect()->route('prestamos.index')->with('info', 'Prestamo registrado correctamente.');
    }

    public function show($id) {
        $prestamo = DB::table('prestamos')
            ->select('prestamos.*', 'socios.nombre', 'socios.apellido', 'libros.titulo')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->join('socios', 'prestamos.id_socio', '=', 'socios.id')
            ->join('autores', 'libros.id_autor', '=', 'autores.id')
            ->where('prestamos.id', '=', $id)->get();

        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id){
        $prestamo = Prestamo::findOrFail($id);
        $libros = DB::table('libros')->get(['id', 'titulo', 'id_autor']);
        $socios = DB::table('socios')->get(['id', 'nombre', 'apellido', 'documento']);

        return view('prestamos.edit', compact('prestamo', 'libros', 'socios'));
    }

    public function update(CreatePrestamoRequest $request, $id){
        Prestamo::findOrFail($id)->update($request->all());

        return redirect()->route('prestamos.index')->with('info', 'Préstamo actualizado correctamente.');
    }

    public function destroy($id){
        Prestamo::findOrFail($id)->delete();

        return redirect()->route('prestamos.index');
    }
}