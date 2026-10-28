<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateTeamRequest extends StoreTeamRequest
{
    public function rules(): array
    {

        $team = $this->route('team') ?? $this->route('teams');
        $teamId = is_object($team) ? $team->id : $team;

        return array_merge(parent::rules(), [
            'name' => [
                'required', 
                'string', 
                'max:100', 
                Rule::unique('teams', 'name')->ignore($teamId)
            ],
            'code' => [
                'required', 
                'string', 
                'size:3', 
                'alpha', 
                Rule::unique('teams', 'code')->ignore($teamId)
            ],
        ]);
    }
}