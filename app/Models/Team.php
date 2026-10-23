<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'categoria', 'zona', 'bandera', 'ciudad', 'entrenador', 'anio_fundacion'];
    public function homeGames()
    {
        return $this->hasMany(GameMatch::class, 'home_team_id');
    }
    public function awayGames()
    {
        return $this->hasMany(GameMatch::class, 'away_team_id');
    }
    protected $guarded = [];
    public const CATEGORIES = [
        'mayores' => 'Mayores Varones',
        'u19'     => 'U19',
        'u14'     => 'U14',
    ];
}
