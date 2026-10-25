<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::create([
            'name' => 'Leones de Andahuaylas',
            'code' => 'AND',
            'category' => 'hombres',
            'zone' => 'Zona A',
            'flag' => 'leones.png',
            'city' => 'Andahuaylas',
            'coach' => 'Carlos Mendoza',
            'founded' => 2015,
        ]);

        Team::create([
            'name' => 'Titanes de Abancay',
            'code' => 'ABA',
            'category' => 'hombres',
            'zone' => 'Zona A',
            'flag' => 'titanes.png',
            'city' => 'Abancay',
            'coach' => 'Luis Ramos',
            'founded' => 2018,
        ]);

        Team::create([
            'name' => 'Águilas Doradas',
            'code' => 'AGU',
            'category' => 'hombres',
            'zone' => 'Zona B',
            'flag' => 'aguilas.png',
            'city' => 'Cusco',
            'coach' => 'Mario Quispe',
            'founded' => 2012,
        ]);
    }
}