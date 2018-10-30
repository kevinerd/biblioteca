<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMensajeRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'mail' => 'required',
            'mensaje' => 'required'
        ];
    }
}
