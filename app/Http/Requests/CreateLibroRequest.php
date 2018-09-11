<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLibroRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'isbn' => 'required',
            'titulo' => 'required',
            'paginas' => 'required',
            'edicion' => 'required',
            'cantidad' => 'required'
        ];
    }
}
