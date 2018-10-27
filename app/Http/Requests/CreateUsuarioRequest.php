<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class CreateUsuarioRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|min:3',
            'documento' => 'required|numeric|min:7',
            'fecha_nac' => 'required',
            'domicilio' => 'required|min:5',
            'telefono' => 'required|min:9',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'admin' => 'in:'.User::USUARIO_ADMIN.','.User::USUARIO_REGULAR
        ];
    }
}
