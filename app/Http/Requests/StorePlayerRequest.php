<?php

namespace App\Http\Requests;

use App\Models\Player;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlayerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'    => ['required', 'string', 'max:80'],
            'last_name'     => ['required', 'string', 'max:80'],
            'team_id'       => ['required', 'exists:teams,id'],
            'jersey_number' => ['required', 'integer'],
            'position'      => ['required', 'string'],
            'birthdate'    => ['nullable', 'date'],
            'height_cm'     => ['nullable', 'integer'],
            ];
    }
}
