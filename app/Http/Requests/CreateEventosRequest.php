<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventosRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
            'id_grupo' => 'required'
        ];
    }
}
