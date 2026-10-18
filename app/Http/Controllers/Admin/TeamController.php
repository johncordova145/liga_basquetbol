<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(Request $request): View
    {
        $category = array_key_exists((string) $request->query('categoria'), Team::CATEGORIES)
            ? $request->query('categoria') : null;

        // withCount evita el problema N+1: cuenta jugadores en la misma consulta.
        $teams = Team::withCount('players')
            ->when($category, fn ($q) => $q->where('category', $category))
            ->orderBy('category')->orderBy('name')
            ->paginate(12)->withQueryString();

        return view('admin.teams.index', compact('teams', 'category'));
    }

    public function create(): View
    {
        return view('admin.teams.create', ['team' => new Team(['category' => 'hombres'])]);
    }

    public function store(StoreTeamRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('flag');

        if ($request->hasFile('flag')) {
            $data['flag'] = $this->storeImage($request->file('flag'), 'flags');
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Equipo creado.');
    }

    public function edit(Team $team): View
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team): RedirectResponse
    {
        $data = $request->safe()->except('flag');

        if ($request->hasFile('flag')) {
            $this->deleteImage($team->flag, 'flags');
            $data['flag'] = $this->storeImage($request->file('flag'), 'flags');
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Equipo actualizado.');
    }

    public function destroy(Team $team): RedirectResponse
    {
        // Regla de negocio: no se borra el historial de partidos.
        if ($team->matches()->exists()) {
            return back()->with('error', 'No se puede eliminar: el equipo tiene partidos registrados.');
        }

        $this->deleteImage($team->flag, 'flags');
        $team->delete(); // sus jugadores se eliminan por cascade en la BD

        return redirect()->route('admin.teams.index')->with('success', 'Equipo eliminado.');
    }
}
