<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\GameMatch;

class MacrorregionalSeeder extends Seeder
{
    public function run(): void
    {
        
        $teamsData = [
            ['name' => 'Ayacucho', 'code' => 'AYA', 'city' => 'Ayacucho', 'category' => 'B (13-14 años)'],
            ['name' => 'Madre de Dios', 'code' => 'MDD', 'city' => 'Puerto Maldonado', 'category' => 'B (13-14 años)'],
            ['name' => 'Cusco', 'code' => 'CUS', 'city' => 'Cusco', 'category' => 'B (13-14 años)'],
            ['name' => 'Apurímac', 'code' => 'APU', 'city' => 'Abancay', 'category' => 'B (13-14 años)'],
        ];

        $teams = [];
        foreach ($teamsData as $team) {
            $teams[$team['name']] = Team::firstOrCreate(['name' => $team['name']], $team);
        }

        
        $matches = [
          
            [
                'home_team_id' => $teams['Ayacucho']->id,
                'away_team_id' => $teams['Apurímac']->id,
                'played_at' => '2026-10-30 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 1ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Madre de Dios']->id,
                'away_team_id' => $teams['Cusco']->id,
                'played_at' => '2026-10-31 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 1ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Cusco']->id,
                'away_team_id' => $teams['Apurímac']->id,
                'played_at' => '2026-11-01 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 1ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Madre de Dios']->id,
                'away_team_id' => $teams['Ayacucho']->id,
                'played_at' => '2026-11-02 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 1ra Fecha',
                'status' => 'scheduled',
            ],

        
            [
                'home_team_id' => $teams['Cusco']->id,
                'away_team_id' => $teams['Madre de Dios']->id,
                'played_at' => '2026-11-03 09:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 2da Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Ayacucho']->id,
                'away_team_id' => $teams['Apurímac']->id,
                'played_at' => '2026-11-04 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 2da Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Ayacucho']->id,
                'away_team_id' => $teams['Madre de Dios']->id,
                'played_at' => '2026-11-05 11:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 2da Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Cusco']->id,
                'away_team_id' => $teams['Apurímac']->id,
                'played_at' => '2026-11-06 12:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 2da Fecha',
                'status' => 'scheduled',
            ],

         
            [
                'home_team_id' => $teams['Ayacucho']->id,
                'away_team_id' => $teams['Cusco']->id,
                'played_at' => '2026-11-07 09:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 3ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Apurímac']->id,
                'away_team_id' => $teams['Madre de Dios']->id,
                'played_at' => '2026-11-07 10:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'DAMAS - 3ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Cusco']->id,
                'away_team_id' => $teams['Ayacucho']->id,
                'played_at' => '2026-11-08 11:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 3ra Fecha',
                'status' => 'scheduled',
            ],
            [
                'home_team_id' => $teams['Apurímac']->id,
                'away_team_id' => $teams['Madre de Dios']->id,
                'played_at' => '2026-11-09 12:00:00',
                'venue' => 'PUEBLO LIBRE',
                'stage' => 'VARONES - 3ra Fecha',
                'status' => 'scheduled',
            ],
        ];

        foreach ($matches as $match) {
            GameMatch::create($match);
        }
    }
    
}