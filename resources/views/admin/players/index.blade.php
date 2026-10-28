@extends('layouts.admin')

@section('content')
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Listado de Jugadores</h2>
        <a href="{{ route('admin.players.create') }}" class="bg-yellow-500 text-slate-950 font-semibold px-4 py-2 rounded-lg">
            + Nuevo Jugador
        </a>
    </div>

    <table class="w-full text-left text-gray-300">
        <thead class="bg-slate-950 text-xs uppercase text-gray-400">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Equipo</th>
                <th class="p-3">Posición</th>
                <th class="p-3">Dorsal</th>
                <th class="p-3">Nacimiento</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($players as $player)
                <tr>
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3 text-white font-medium">{{ $player->first_name }} {{ $player->last_name }}</td>
                    <td class="p-3">{{ $player->team->name ?? 'Sin equipo' }}</td>
                    <td class="p-3">{{ $player->position }}</td>
                    <td class="p-3">#{{ $player->jersey_number }}</td>
                    <td class="p-3">{{ $player->birthdate ?? '-' }}</td>
                    <td class="p-3 flex space-x-2">
                        <a href="{{ route('admin.players.edit', $player) }}" class="bg-yellow-500 text-slate-950 px-3 py-1 rounded text-sm font-medium">Editar</a>
                        <form action="{{ route('admin.players.destroy', $player) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este jugador?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm font-medium">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">No hay jugadores registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection