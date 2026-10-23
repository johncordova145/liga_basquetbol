<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function index(Request $request): View
    {
        $teamId = $request->integer('equipo') ?: null;

        $players = Player::with('team')
            ->when($teamId, fn ($q) => $q->where('team_id', $teamId))
            ->orderBy('team_id')->orderBy('jersey_number')
            ->paginate(15)->withQueryString();

        return view('admin.players.index', [
            'players' => $players,
            'teams' => Team::orderBy('name')->get(),
            'teamId' => $teamId,
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.players.create', [
            'player' => new Player(['team_id' => $request->integer('equipo') ?: null]),
            'teams' => Team::orderBy('name')->get(),
        ]);
    }

    public function store(StorePlayerRequest $request): RedirectResponse
    {
        $player = Player::create($request->validated());

        return redirect()->route('admin.players.index', ['equipo' => $player->team_id])
            ->with('success', 'Jugador agregado.');
    }

    public function edit(Player $player): View
    {
        return view('admin.players.edit', [
            'player' => $player,
            'teams' => Team::orderBy('name')->get(),
        ]);
    }

    public function update(UpdatePlayerRequest $request, Player $player): RedirectResponse
    {
        $player->update($request->validated());

        return redirect()->route('admin.players.index', ['equipo' => $player->team_id])
            ->with('success', 'Jugador actualizado.');
    }

    public function destroy(Player $player): RedirectResponse
    {
        $teamId = $player->team_id;
        $player->delete();

        return redirect()->route('admin.players.index', ['equipo' => $teamId])
            ->with('success', 'Jugador eliminado.');
    }
}
