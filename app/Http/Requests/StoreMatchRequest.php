<?php

namespace App\Http\Requests;

use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreMatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $needsScore = fn () => in_array($this->input('status'), [GameMatch::LIVE, GameMatch::FINISHED], true);

        return [
            'home_team_id' => ['required', 'exists:teams,id'],
            'away_team_id' => ['required', 'exists:teams,id', 'different:home_team_id'],
            'played_at' => ['required', 'date'],
            'stage' => ['nullable', 'string', 'max:80'],
            'venue' => ['nullable', 'string', 'max:120'],
            'status' => ['required', Rule::in(array_keys(GameMatch::STATUSES))],
            // El marcador es obligatorio solo si el partido está en vivo o terminó.
            'home_score' => ['nullable', 'integer', 'min:0', 'max:300', Rule::requiredIf($needsScore)],
            'away_score' => ['nullable', 'integer', 'min:0', 'max:300', Rule::requiredIf($needsScore)],
        ];
    }

    /** Reglas de negocio que dependen de varios campos a la vez. */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->isNotEmpty()) {
                    return;
                }

                // Los dos equipos deben ser de la misma categoría.
                $categories = Team::whereIn('id', [$this->input('home_team_id'), $this->input('away_team_id')])
                    ->pluck('category')->unique();

                if ($categories->count() > 1) {
                    $validator->errors()->add('away_team_id', 'Los dos equipos deben ser de la misma categoría.');
                }

                // En básquetbol no hay empates al finalizar.
                if ($this->input('status') === GameMatch::FINISHED
                    && (int) $this->input('home_score') === (int) $this->input('away_score')) {
                    $validator->errors()->add('away_score', 'Un partido finalizado no puede terminar empatado.');
                }
            },
        ];
    }

    /** Datos validados; si el partido está programado se descartan los puntajes. */
    public function payload(): array
    {
        $data = $this->validated();

        if ($data['status'] === GameMatch::SCHEDULED) {
            $data['home_score'] = null;
            $data['away_score'] = null;
        }

        return $data;
    }
}
