@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Gestión de Jugadores</h1>
            <p class="text-sm text-gray-400 mt-1">Registro y control de deportistas por categorías y equipos.</p>
        </div>
        <a href="{{ route('admin.players.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-4 py-2 rounded-lg shadow transition duration-150">
            + Nuevo Jugador
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/60 text-gray-400 uppercase text-xs tracking-wider border-b border-slate-800">
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Equipo</th>
                        <th class="py-3 px-4">Posición</th>
                        <th class="py-3 px-4">Dorsal</th>
                        <th class="py-3 px-4">Edad</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-gray-300 text-sm">
                    @forelse($players as $player)
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="py-3 px-4 font-medium text-white">{{ $player->id }}</td>
                            <td class="py-3 px-4 font-semibold text-white">{{ $player->nombre }}</td>
                            <td class="py-3 px-4 text-yellow-400">{{ $player->team->nombre ?? 'Sin Equipo' }}</td>
                            <td class="py-3 px-4">{{ $player->posicion }}</td>
                            <td class="py-3 px-4">#{{ $player->numero }}</td>
                            <td class="py-3 px-4">{{ $player->edad ?? '-' }}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <a href="{{ route('admin.players.edit', $player) }}" class="inline-block bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 px-3 py-1 rounded text-xs font-medium transition">Editar</a>
                                <form action="{{ route('admin.players.destroy', $player) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500/10 text-red-400 hover:bg-red-500/20 px-3 py-1 rounded text-xs font-medium transition" onclick="return confirm('¿Desea eliminar este jugador?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500">No hay jugadores registrados actualmente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($players, 'links'))
            <div class="p-4 border-t border-slate-800 bg-slate-950/30">
                {{ $players->links('vendor.pagination.fiba') }}
            </div>
        @endif
    </div>
</div>
@endsection