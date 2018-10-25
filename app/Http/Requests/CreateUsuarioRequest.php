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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'admin' => 'in:'.User::USUARIO_ADMIN.','.User::USUARIO_REGULAR
        ];
    }
}
