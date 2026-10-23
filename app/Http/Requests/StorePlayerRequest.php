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
            'team_id' => ['required', 'exists:teams,id'],
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            // El dorsal no se puede repetir DENTRO del mismo equipo.
            'jersey_number' => [
                'required', 'integer', 'between:0,99',
                Rule::unique('players', 'jersey_number')->where('team_id', $this->input('team_id')),
            ],
            'position' => ['required', Rule::in(array_keys(Player::POSITIONS))],
            'height_cm' => ['nullable', 'integer', 'between:140,240'],
            'birth_date' => ['nullable', 'date', 'before:today'],
        ];
    }
}
