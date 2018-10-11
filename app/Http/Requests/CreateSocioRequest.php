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
            'fecha_nac' => 'required',
            'id_grupo' => 'required'
        ];
    }
}
