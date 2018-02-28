<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateForm;

class SiteController extends Controller
{
    public function home(){
        return view('site.index');
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
