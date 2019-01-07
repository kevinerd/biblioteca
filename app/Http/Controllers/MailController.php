<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {
    /*public function index(){
        return view('emails.welcome');
    }

    public function send(Request $request){
        //guarda el valor de los campos enviados desde el form en un array
        $data = $request->all();

        //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
        Mail::send('emails.message', $data, function($message) use ($request) {
            //remitente
            $message->from('admin@biblioteca.dev', 'Biblioteca Popular Susana Llera');

            //asunto
            $message->subject($request->subject);

            //receptor
            $message->to('kevinjf2011@gmail.com')->subject($request->subject);

        });
        return view('emails.success');
    }*/
}
