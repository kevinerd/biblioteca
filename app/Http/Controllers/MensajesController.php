<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMensajeRequest;
use App\Mensaje;
use DB;

class MensajesController extends Controller{
    public function __construct(){
        //$this->middleware('auth')->except(MensajesController::create());
    }

    public function index(){
        $mensajes = Mensaje::all();

        return view('mensajes.index', compact('mensajes'));
    }

    public function create(){
        return view('mensajes.contacto');
    }

    public function store(CreateMensajeRequest $request){
        Mensaje::create($request->all());
        return back()
            ->with('info', 'Mensaje enviado. En breve te escribiremos a tu correo electrónico. Muchas gracias.');
    }

    public function show($id){
        $mensaje = Mensaje::findOrFail($id);

        return view('mensajes.show', compact('mensaje'));
    }

   /* public function edit($id){
        $mensaje = Mensaje::findOrFail($id);

        return view('mensajes.edit', compact('mensaje'));
    }

    public function update(CreateMensajeRequest $request, $id){
        Mensaje::findOrFail($id)->update($request->all());

        return redirect()->route('mensajes.index');
    }*/

    public function destroy($id){
        Mensaje::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}
