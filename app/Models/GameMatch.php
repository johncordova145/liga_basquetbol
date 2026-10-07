<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/** "GameMatch" y no "Match": `match` es palabra reservada en PHP 8. */
class GameMatch extends Model
{
    public const SCHEDULED = 'scheduled';
    public const LIVE = 'live';
    public const FINISHED = 'finished';

    public const STATUSES = [
        self::SCHEDULED => 'Programado',
        self::LIVE => 'En vivo',
        self::FINISHED => 'Final',
    ];

    protected $table = 'game_matches';

    protected $fillable = [
        'home_team_id', 'away_team_id', 'played_at', 'stage',
        'venue', 'status', 'home_score', 'away_score',
    ];

    protected $casts = ['played_at' => 'datetime'];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    // ---- Scopes: GameMatch::finished()->get() ----
    public function scopeFinished(Builder $q): Builder
    {
        return $q->where('status', self::FINISHED);
    }

    public function scopeLive(Builder $q): Builder
    {
        return $q->where('status', self::LIVE);
    }

    public function scopeScheduled(Builder $q): Builder
    {
        return $q->where('status', self::SCHEDULED);
    }

    public function scopeOnDate(Builder $q, $date): Builder
    {
        return $q->whereDate('played_at', $date);
    }

    // ---- Ayudantes ----
    public function isFinished(): bool
    {
        return $this->status === self::FINISHED;
    }

    public function isLive(): bool
    {
        return $this->status === self::LIVE;
    }

    /** ¿Hay marcador que mostrar? (en vivo o final) */
    public function hasScore(): bool
    {
        return $this->status !== self::SCHEDULED
            && $this->home_score !== null
            && $this->away_score !== null;
    }

    /** 'home' | 'away' | null (solo cuando el partido terminó). */
    public function winnerSide(): ?string
    {
        if (! $this->isFinished() || ! $this->hasScore()) {
            return null;
        }

        return $this->home_score > $this->away_score ? 'home' : 'away';
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
