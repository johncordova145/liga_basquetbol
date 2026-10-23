<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::create([
            'nombre' => 'Leones de Andahuaylas',
            'codigo' => 'AND',
            'categoria' => 'hombres',
            'zona' => 'Zona A',
            'bandera' => 'leones.png',
            'ciudad' => 'Andahuaylas',
            'entrenador' => 'Carlos Mendoza',
            'anio_fundacion' => 2015,
        ]);

        Team::create([
            'nombre' => 'Titanes de Abancay',
            'codigo' => 'ABA',
            'categoria' => 'hombres',
            'zona' => 'Zona A',
            'bandera' => 'titanes.png',
            'ciudad' => 'Abancay',
            'entrenador' => 'Luis Ramos',
            'anio_fundacion' => 2018,
        ]);

        Team::create([
            'nombre' => 'Águilas Doradas',
            'codigo' => 'AGU',
            'categoria' => 'hombres',
            'zona' => 'Zona B',
            'bandera' => 'aguilas.png',
            'ciudad' => 'Cusco',
            'entrenador' => 'Mario Quispe',
            'anio_fundacion' => 2012,
        ]);
    }
}