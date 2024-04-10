<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tarea' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'urgencia' => 'required',
        ];
    }
}
