<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'documento' => 'required|numeric|min:7',
            'fecha_nac' => 'required',
            'domicilio' => 'required|min:5',
            'telefono' => 'required|min:7',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'admin' => 'in:'.User::USUARIO_ADMIN.','.User::USUARIO_REGULAR
        ];
    }
}
