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
        $teamsData = [
            ['name' => 'Titanes de Abancay', 'code' => 'TAB', 'category' => 'mayores', 'zone' => 'Apurímac', 'city' => 'Abancay'],
            ['name' => 'Leones de Andahuaylas', 'code' => 'LDA', 'category' => 'mayores', 'zone' => 'Apurímac', 'city' => 'Andahuaylas'],
            ['name' => 'Águilas Doradas Abancay', 'code' => 'AGA', 'category' => 'mayores', 'zone' => 'Apurímac', 'city' => 'Abancay'],
            ['name' => 'Cienciano Básquet', 'code' => 'CUS', 'category' => 'mayores', 'zone' => 'Sur', 'city' => 'Cusco'],
            ['name' => 'Real Club Lima', 'code' => 'RCL', 'category' => 'mayores', 'zone' => 'Centro', 'city' => 'Lima'],
            ['name' => 'Regatas Lima', 'code' => 'REG', 'category' => 'mayores', 'zone' => 'Centro', 'city' => 'Lima'],
        ];

        $teamModels = [];
        foreach ($teamsData as $data) {
            $teamModels[] = Team::firstOrCreate(['code' => $data['code']], $data);
        }

        GameMatch::truncate();

        $startDate = Carbon::create(2026, 10, 1);
        $endDate = Carbon::create(2026, 10, 31);
        $categories = ['mayores', 'u19', 'u14']; // Categorías disponibles

        while ($startDate <= $endDate) {
            $matchesPerDay = rand(1, 3);

            for ($i = 0; $i < $matchesPerDay; $i++) {
                $homeTeam = $teamModels[array_rand($teamModels)];
                do {
                    $awayTeam = $teamModels[array_rand($teamModels)];
                } while ($homeTeam->id === $awayTeam->id);

                $isFinished = $startDate->lt(Carbon::now());

                GameMatch::create([
                    'home_team_id' => $homeTeam->id,
                    'away_team_id' => $awayTeam->id,
                    'played_at'    => $startDate->copy()->setHour(rand(14, 20))->setMinute(0),
                    'home_score'   => $isFinished ? rand(50, 90) : null,
                    'away_score'   => $isFinished ? rand(50, 90) : null,
                    'status'       => $isFinished ? 'finished' : 'scheduled',
                    'category'     => $categories[array_rand($categories)], // Asignar categoría aleatoria
                ]);
            }

            $startDate->addDay();
        }
    }
}