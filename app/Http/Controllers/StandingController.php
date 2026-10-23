<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\GameMatch;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(Request $request)
    {
        $categoria = $request->get('categoria', 'Mayores Varones');

        $equipos = Team::all()->map(function ($equipo) use ($categoria) {
            $partidosLocal = GameMatch::where('equipo_local_id', $equipo->id)
                ->where('categoria', $categoria)
                ->where('estado', 'FINAL')
                ->get();

            $partidosVisitante = GameMatch::where('equipo_visitante_id', $equipo->id)
                ->where('categoria', $categoria)
                ->where('estado', 'FINAL')
                ->get();

            $pj = $partidosLocal->count() + $partidosVisitante->count();
            $pg = 0;
            $pp = 0;
            $pf = 0;
            $pc = 0;

            foreach ($partidosLocal as $m) {
                $pf += $m->puntos_local;
                $pc += $m->puntos_visitante;
                if ($m->puntos_local > $m->puntos_visitante) {
                    $pg++;
                } else {
                    $pp++;
                }
            }

            foreach ($partidosVisitante as $m) {
                $pf += $m->puntos_visitante;
                $pc += $m->puntos_local;
                if ($m->puntos_visitante > $m->puntos_local) {
                    $pg++;
                } else {
                    $pp++;
                }
            }

            $puntos = ($pg * 2) + ($pp * 1);
            $dif = $pf - $pc;

            return (object) [
                'equipo' => $equipo->nombre,
                'pj' => $pj,
                'pg' => $pg,
                'pp' => $pp,
                'pf' => $pf,
                'pc' => $pc,
                'dif' => $dif,
                'puntos' => $puntos,
            ];
        })->sortByDesc('puntos')->values();

        return view('public.standings', compact('equipos', 'categoria'));
    }
}