<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'category',
        'zone',
        'flag',
        'city',
        'coach',
        'founded',
    ];

    protected $guarded = [];

    public const CATEGORIES = [
        'hombres'  => 'Hombres',
        'femenino' => 'Femenino',
        'u19'      => 'U19',
        'u14'      => 'U14',
    ];

    public function homeGames()
    {
        return $this->hasMany(GameMatch::class, 'home_team_id');
    }

    public function awayGames()
    {
        return $this->hasMany(GameMatch::class, 'away_team_id');
    }

    public static function standings($category = null, $group = null, $finishedMatches = null)
    {
        $teams = self::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        $matches = $finishedMatches ?? GameMatch::finished()->get();

        return $teams->map(function ($team) use ($matches) {
            $team->jugados = 0;
            $team->ganados = 0;
            $team->perdidos = 0;
            $team->puntos = 0;

            foreach ($matches as $match) {
                if ($match->home_team_id === $team->id || $match->away_team_id === $team->id) {
                    $isHome = $match->home_team_id === $team->id;
                    $team->jugados++;

                    $homeScore = $match->home_score ?? 0;
                    $awayScore = $match->away_score ?? 0;

                    if ($isHome) {
                        if ($homeScore > $awayScore) {
                            $team->ganados++;
                            $team->puntos += 2;
                        } else {
                            $team->perdidos++;
                            $team->puntos += 1;
                        }
                    } else {
                        if ($awayScore > $homeScore) {
                            $team->ganados++;
                            $team->puntos += 2;
                        } else {
                            $team->perdidos++;
                            $team->puntos += 1;
                        }
                    }
                }
            }

            return $team;
        })->sortByDesc('puntos')->values();
    }
}