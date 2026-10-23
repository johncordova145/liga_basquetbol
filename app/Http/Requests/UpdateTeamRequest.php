<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/** Igual que al crear, pero "nombre" y "código" pueden conservar su propio valor. */
class UpdateTeamRequest extends StoreTeamRequest
{
    public function rules(): array
    {
        $team = $this->route('team');

        return array_merge(parent::rules(), [
            'name' => ['required', 'string', 'max:100', Rule::unique('teams', 'name')->ignore($team)],
            'code' => ['required', 'string', 'size:3', 'alpha', Rule::unique('teams', 'code')->ignore($team)],
        ]);
    }
}
