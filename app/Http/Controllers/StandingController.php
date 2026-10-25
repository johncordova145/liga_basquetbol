<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\GameMatch;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('categoria', 'hombres');

        $teams = Team::all()->map(function ($team) use ($category) {
            $homeMatches = GameMatch::where('home_team_id', $team->id)
                ->where('stage', 'like', '%' . $category . '%')
                ->where('status', 'finished')
                ->get();

            $awayMatches = GameMatch::where('away_team_id', $team->id)
                ->where('stage', 'like', '%' . $category . '%')
                ->where('status', 'finished')
                ->get();

            $pj = $homeMatches->count() + $awayMatches->count();
            $pg = 0;
            $pp = 0;
            $pf = 0;
            $pc = 0;

            foreach ($homeMatches as $m) {
                $pf += $m->home_score;
                $pc += $m->away_score;
                if ($m->home_score > $m->away_score) {
                    $pg++;
                } else {
                    $pp++;
                }
            }

            foreach ($awayMatches as $m) {
                $pf += $m->away_score;
                $pc += $m->home_score;
                if ($m->away_score > $m->home_score) {
                    $pg++;
                } else {
                    $pp++;
                }
            }

            $points = ($pg * 2) + ($pp * 1);
            $dif = $pf - $pc;

            return (object) [
                'equipo' => $team->name,
                'pj' => $pj,
                'pg' => $pg,
                'pp' => $pp,
                'pf' => $pf,
                'pc' => $pc,
                'dif' => $dif,
                'puntos' => $points,
            ];
        })->sortByDesc('puntos')->values();

        $categoria = $category;

        return view('public.standings', compact('teams', 'categoria'));
    }
}