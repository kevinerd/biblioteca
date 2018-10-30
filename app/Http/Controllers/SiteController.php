<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Evento;
use App\Http\Requests\ValidateForm;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller {
    public function __construct(){
        $this->middleware('auth')->only('admin');
        $this->middleware('admin')->only('admin');
    }
    public function home(){
        $libros = DB::table('libros')
            ->where('destacado', '=', '1')->get();
        $libroSem = DB::table('libros')
            ->where('libros.semanal', '=', '1')->get();
        $eventos = DB::table('eventos')->get();
        Evento::all();
        Libro::all();

        return view('site.index', compact('libros', 'eventos', 'libroSem'));
    }

    public function admin(){
        return view('index');
    }

    /*public function contacto(){
        return view('site.contacto');
    }

    public function contacto_response(){
        return view('site.contacto_response');
    }*/

    public function formularioSite(ValidateForm $request) {
        $request->all();

        return back()
            ->with('info', 'Tu mensaje ha sido enviado, en breve recibirás una respuesta.');
    }

    public function historia(){
        return view('site.historia');
    }
}
