<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateForm;
use Illuminate\Support\Facades\DB;
use App\Libro;

class SiteController extends Controller
{
    public function home(){
        $libros = DB::table('libros')->get();

        Libro::all();

        return view('site.index', compact('libros'));
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
        $data = $request->all();

        return back()
            ->with('info', 'Tu mensaje ha sido enviado, en breve recibirás una respuesta.');
    }
}
