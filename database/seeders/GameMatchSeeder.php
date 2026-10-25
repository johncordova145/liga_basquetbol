<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameMatch;
use App\Models\Team;
use Carbon\Carbon;

class GameMatchSeeder extends Seeder
{
    public function run(): void
    {
        $team1 = Team::firstOrCreate(['id' => 1], ['name' => 'Ilo', 'code' => 'ILO', 'category' => 'Masculino', 'city' => 'Ilo']);
        $team2 = Team::firstOrCreate(['id' => 2], ['name' => 'Cerro Colorado', 'code' => 'CCO', 'category' => 'Masculino', 'city' => 'Arequipa']);
        $team3 = Team::firstOrCreate(['id' => 3], ['name' => 'Abancay', 'code' => 'ABA', 'category' => 'Femenino', 'city' => 'Abancay']);
        $team4 = Team::firstOrCreate(['id' => 4], ['name' => 'Juliaca', 'code' => 'JUL', 'category' => 'Femenino', 'city' => 'Juliaca']);

        GameMatch::create([
            'home_team_id' => $team1->id,
            'away_team_id' => $team2->id,
            'played_at' => Carbon::parse('2026-10-24 12:00:00'),
            'home_score' => 84,
            'away_score' => 72,
            'status' => 'finished',
            'stage' => 'Fase de Grupos - Masculino'
        ]);

        GameMatch::create([
            'home_team_id' => $team3->id,
            'away_team_id' => $team4->id,
            'played_at' => Carbon::parse('2026-10-24 15:30:00'),
            'home_score' => 61,
            'away_score' => 68,
            'status' => 'finished',
            'stage' => 'Fase de Grupos - Femenino'
        ]);

        GameMatch::create([
            'home_team_id' => $team1->id,
            'away_team_id' => $team3->id,
            'played_at' => Carbon::parse('2026-10-25 16:00:00'),
            'home_score' => 0,
            'away_score' => 0,
            'status' => 'scheduled',
            'stage' => 'Semifinal - Masculino'
        ]);

        GameMatch::create([
            'home_team_id' => $team2->id,
            'away_team_id' => $team4->id,
            'played_at' => Carbon::parse('2026-10-25 19:00:00'),
            'home_score' => 0,
            'away_score' => 0,
            'status' => 'scheduled',
            'stage' => 'Final - Femenino'
        ]);
    }
}