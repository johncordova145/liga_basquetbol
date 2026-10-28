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
            'name' => 'required|string|max:255|unique:teams,name',
            'code' => 'required|string|max:10',
            'category' => 'required|string|max:255',
            'zone' => 'required|string|max:255',
            'flag' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,jfif', 'max:2048'],
            'city' => 'required|string|max:255',
            'coach' => 'required|string|max:255',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }
}