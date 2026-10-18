<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:teams,nombre',
            'codigo' => 'required|string|max:10',
            'categoria' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            'bandera' => 'nullable|string|max:255',
            'ciudad' => 'required|string|max:255',
            'entrenador' => 'required|string|max:255',
            'anio_fundacion' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }
}