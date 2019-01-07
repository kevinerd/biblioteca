<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrestamoRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id_libro' => 'required',
            'id_user' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'devuelto' => 'required',
            'aviso' => 'required'
        ];
    }
}
