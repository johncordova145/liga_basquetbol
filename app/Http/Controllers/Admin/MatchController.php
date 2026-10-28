<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Models\GameMatch;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MatchController extends Controller
{
    public function index(Request $request): View
    {
        $status = array_key_exists((string) $request->query('estado'), GameMatch::STATUSES)
            ? $request->query('estado') : null;

        $matches = GameMatch::with(['homeTeam', 'awayTeam'])->latest()->get();

        return view('admin.matches.index', compact('matches'));
    }

    public function create(): View
    {
        return view('admin.matches.create', [
            'match' => new GameMatch([
            'status' => 'scheduled', 
            'played_at' => now()->addDay()->setTime(19, 0)
        ]),
            'teams' => \App\Models\Team::orderBy('name')->get(),
        ]);
    }

    public function store(StoreMatchRequest $request): RedirectResponse
    {
        GameMatch::create($request->payload());

        return redirect()->route('admin.matches.index')->with('success', 'Partido registrado.');
    }

    public function edit(GameMatch $match): View
    {
        
        $teams = Team::all();
        return view('admin.matches.edit', compact('match', 'teams'));
        
    }

    public function update(UpdateMatchRequest $request, GameMatch $match): RedirectResponse
    {
        $match->update($request->payload());

        return redirect()->route('admin.matches.index')->with('success', 'Partido actualizado.');
    }

    public function destroy(GameMatch $match ): RedirectResponse
    {
        $match->delete();

        return redirect()->route('admin.matches.index')->with('success', 'Partido eliminado.');
    }


    private function teamsByCategory()
    {
        return Team::orderBy('name')->get()->groupBy('category');
    }
}
