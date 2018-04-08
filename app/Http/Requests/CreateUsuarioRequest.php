<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'mail' => 'required',
            'usuario' => 'required',
            'password' => 'required'
        ];
    }
}
