<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameMatch;
use App\Models\News;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                ['label' => 'Equipos', 'value' => Team::count(), 'icon' => 'bi-shield-shaded', 'route' => 'admin.teams.index'],
                ['label' => 'Jugadores', 'value' => Player::count(), 'icon' => 'bi-people-fill', 'route' => 'admin.players.index'],
                ['label' => 'Partidos', 'value' => GameMatch::count(), 'icon' => 'bi-dribbble', 'route' => 'admin.matches.index'],
                ['label' => 'Noticias', 'value' => News::count(), 'icon' => 'bi-newspaper', 'route' => 'admin.news.index'],
            ],
            'liveCount' => GameMatch::live()->count(),
            'usersCount' => User::count(),
            'upcoming' => GameMatch::with(['homeTeam', 'awayTeam'])->scheduled()
                ->where('played_at', '>=', now())->orderBy('played_at')->take(5)->get(),
            'recent' => GameMatch::with(['homeTeam', 'awayTeam'])->finished()
                ->latest('played_at')->take(5)->get(),
            'drafts' => News::whereNull('published_at')->count(),
        ]);
    }
}
