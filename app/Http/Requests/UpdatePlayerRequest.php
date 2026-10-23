<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdatePlayerRequest extends StorePlayerRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'jersey_number' => [
                'required', 'integer', 'between:0,99',
                Rule::unique('players', 'jersey_number')
                    ->where('team_id', $this->input('team_id'))
                    ->ignore($this->route('player')),
            ],
        ]);
    }
}
