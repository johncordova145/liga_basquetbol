<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameMatch;

class GameMatchSeeder extends Seeder
{   
    public function run(): void
    {
        GameMatch::create([
            'home_team_id' => 1,
            'away_team_id' => 2,
            'fecha_partido' => '2026-06-15 18:00:00',
            'fase' => 'Fase de Grupos - Fecha 1',
            'lugar' => 'Coliseo Cerrado de Andahuaylas',
            'estado' => 'programado',
        ]);

        GameMatch::create([
            'home_team_id' => 2,
            'away_team_id' => 3,
            'fecha_partido' => '2026-06-22 20:00:00',
            'fase' => 'Fase de Grupos - Fecha 2',
            'lugar' => 'Coliseo Cubierto de Abancay',
            'estado' => 'programado',
        ]);
    }
}