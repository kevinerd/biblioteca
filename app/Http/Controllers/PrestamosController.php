<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamoRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Prestamo;
use DB;

class PrestamosController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $prestamos = DB::table('prestamos')
            ->join('users', 'prestamos.id_user', '=', 'users.id')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->get([
                'prestamos.*', 'users.name', 'libros.titulo'
            ]);

        Prestamo::all();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create(){
        $libros = DB::table('libros')->get(['id', 'titulo', 'id_autor']);
        $users = DB::table('users')->get(['id', 'name', 'documento']);

        /*$libros = Libro::pluck('titulo', 'id')->prepend('Selecciona un libro...');
        $socios = Socio::select(
            DB::raw('CONCAT(nombre," ", apellido) AS nombre'), 'id')
            ->pluck('nombre', 'id')
            ->prepend('Selecciona un socio...');*/

        return view('prestamos.create', compact('libros', 'users'));
    }

    public function store(CreatePrestamoRequest $request){
        Prestamo::create($request->all());

        return redirect()->route('prestamos.index')->with('info', 'Prestamo registrado correctamente.');
    }

    public function show($id) {
        $prestamo = DB::table('prestamos')
            ->select('prestamos.*', 'users.name', 'libros.titulo')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->join('users', 'prestamos.id_socio', '=', 'users.id')
            ->join('autores', 'libros.id_autor', '=', 'autores.id')
            ->where('prestamos.id', '=', $id)->get();

        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id){
        $prestamo = Prestamo::findOrFail($id);
        $libros = DB::table('libros')->get(['id', 'titulo', 'id_autor']);
        $users = DB::table('users')->get(['id', 'name', 'documento']);

        return view('prestamos.edit', compact('prestamo', 'libros', 'users'));
    }

    public function update(CreatePrestamoRequest $request, $id){
        Prestamo::findOrFail($id)->update($request->all());

        return redirect()->route('prestamos.index')->with('info', 'Préstamo actualizado correctamente.');
    }

    public function destroy(Prestamo $prestamo){
        $prestamo->delete();

        return redirect()->route('prestamos.index');
    }

    public function create_aviso($id){
        $prestamo = DB::table('prestamos')
            ->select('prestamos.*', 'users.*', 'libros.titulo')
            ->join('libros', 'prestamos.id_libro', '=', 'libros.id')
            ->join('users', 'prestamos.id_user', '=', 'users.id')
            ->join('autores', 'libros.id_autor', '=', 'autores.id')
            ->where('prestamos.id', '=', $id)->get();
        return view('emails.aviso_prestamo', compact('prestamo'));
    }

    public function send_aviso(Request $request){
        //guarda el valor de los campos enviados desde el form en un array
        $data = $request->all();

        //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
        Mail::send('emails.message', $data, function($message) use ($request) {
            //remitente
            $message->from('admin@biblioteca.dev', 'Biblioteca Popular Susana Llera');

            //asunto
            $message->subject($request->subject);

            //receptor
            $message->to($request->email)->subject($request->subject);

        });
        return redirect()->route('prestamos.index')->with('info', 'Aviso enviado correctamente.');
    }
}