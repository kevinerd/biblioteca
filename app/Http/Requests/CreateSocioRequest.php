<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSocioRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required',
            'fechaNac' => 'required',
            'tipo_socio' => 'required'
        ];
    }
}
