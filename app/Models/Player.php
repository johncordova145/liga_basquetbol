<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    public const POSITIONS = [
        'base' => 'Base',
        'escolta' => 'Escolta',
        'alero' => 'Alero',
        'ala_pivot' => 'Ala-pívot',
        'pivot' => 'Pívot',
    ];

    protected $fillable = [
        'team_id', 'first_name', 'last_name', 'jersey_number',
        'position', 'height_cm', 'birth_date',
    ];

    protected $casts = ['birth_date' => 'date'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /** $player->full_name */
    protected function fullName(): Attribute
    {
        return Attribute::get(fn () => "{$this->first_name} {$this->last_name}");
    }

    public function positionLabel(): string
    {
        return self::POSITIONS[$this->position] ?? $this->position;
    }
}
