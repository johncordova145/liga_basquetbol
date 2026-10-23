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

/** La ruta usa el parámetro {game} (ver routes/web.php) para evitar la palabra "match". */
class MatchController extends Controller
{
    public function index(Request $request): View
    {
        $status = array_key_exists((string) $request->query('estado'), GameMatch::STATUSES)
            ? $request->query('estado') : null;

        $matches = GameMatch::with(['homeTeam', 'awayTeam'])
            ->when($status, fn ($q) => $q->where('status', $status))
            ->latest('played_at')
            ->paginate(15)->withQueryString();

        return view('admin.matches.index', compact('matches', 'status'));
    }

    public function create(): View
    {
        return view('admin.matches.create', [
            'game' => new GameMatch(['status' => GameMatch::SCHEDULED, 'played_at' => now()->addDay()->setTime(19, 0)]),
            'teams' => $this->teamsByCategory(),
        ]);
    }

    public function store(StoreMatchRequest $request): RedirectResponse
    {
        GameMatch::create($request->payload());

        return redirect()->route('admin.matches.index')->with('success', 'Partido registrado.');
    }

    public function edit(GameMatch $game): View
    {
        return view('admin.matches.edit', [
            'game' => $game,
            'teams' => $this->teamsByCategory(),
        ]);
    }

    public function update(UpdateMatchRequest $request, GameMatch $game): RedirectResponse
    {
        $game->update($request->payload());

        return redirect()->route('admin.matches.index')->with('success', 'Partido actualizado.');
    }

    public function destroy(GameMatch $game): RedirectResponse
    {
        $game->delete();

        return redirect()->route('admin.matches.index')->with('success', 'Partido eliminado.');
    }

    /** Equipos agrupados por categoría para mostrarlos en <optgroup>. */
    private function teamsByCategory()
    {
        return Team::orderBy('name')->get()->groupBy('category');
    }
}
