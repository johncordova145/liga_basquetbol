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

        return view('admin.teams.index', compact('teams'));
    }

    public function create(): View
    {
        return view('admin.teams.create', ['team' => new Team(['category' => 'hombres'])]);
    }

    public function store(StoreTeamRequest $request)
    {
        $data = $request->validated();

        
        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            
            if ($file->isValid()) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('storage/teams'), $filename);
                

                $data['flag'] = $filename;
            }
        } else {
            $data['flag'] = null;
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', '¡Equipo registrado con éxito!');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
   
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100', \Illuminate\Validation\Rule::unique('teams', 'name')->ignore($team->id)],
            'code'     => ['required', 'string', 'max:50', \Illuminate\Validation\Rule::unique('teams', 'code')->ignore($team->id)],
            'category' => ['required', 'string', 'max:100'],
            'zone'     => ['nullable', 'string', 'max:100'],
            'city'     => ['nullable', 'string', 'max:100'],
            'coach'    => ['nullable', 'string', 'max:255'],
            'founded'  => ['nullable', 'integer'],
            'flag'     => ['nullable', 'image', 'max:2048'],
        ]);


        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            if ($file->isValid()) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/teams'), $filename);
                $data['flag'] = $filename;
            }
        }


        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', '¡Equipo actualizado con éxito!');
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
