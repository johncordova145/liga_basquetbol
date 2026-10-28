@extends('layouts.admin')

@section('content')
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
    <h2 class="text-xl font-bold text-white mb-1">Editar Jugador</h2>
    <p class="text-sm text-gray-400 mb-6">Modifica los datos del deportista.</p>

    <form action="{{ route('admin.players.update', $player) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
                <input type="text" name="first_name" value="{{ old('first_name', $player->first_name) }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Apellido</label>
                <input type="text" name="last_name" value="{{ old('last_name', $player->last_name) }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Equipo</label>
            <select name="team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team_id', $player->team_id) == $team->id ? 'selected' : '' }}>
                        {{ $team->name }} ({{ ucfirst($team->category) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Número de Camiseta (#)</label>
                <input type="number" name="jersey_number" value="{{ old('jersey_number', $player->jersey_number) }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Posición</label>
                <select name="position" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    @foreach(['Base', 'Escolta', 'Alero', 'Ala-Pívot', 'Pívot'] as $pos)
                        <option value="{{ $pos }}" {{ old('position', $player->position) == $pos ? 'selected' : '' }}>{{ $pos }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fecha de Nacimiento</label>
                <input type="date" name="birthdate" value="{{ old('birthdate', $player->birthdate) }}" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Estatura (cm)</label>
                <input type="number" name="height_cm" value="{{ old('height_cm', $player->height_cm) }}" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
            <a href="{{ route('admin.players.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white">
                Cancelar
            </a>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg">
                Actualizar Jugador
            </button>
        </div>
    </form>
</div>
@endsection