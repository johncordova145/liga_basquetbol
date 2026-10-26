@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Programar Nuevo Partido</h1>
            <p class="text-sm text-gray-400 mt-1">Configura el calendario, fecha y enfrenta a los clubes de la liga.</p>
        </div>
        <a href="{{ route('admin.matches.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>


    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.matches.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Local</label>
                    <select name="home_team_id" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione equipo local</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ old('home_team_id', $game->home_team_id) == $team->id ? 'selected' : '' }}>
                                {{ $team->name }} ({{ ucfirst($team->category) }})
                            </option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Visitante</label>
                    <select name="away_team_id" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione equipo visitante</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ old('away_team_id', $game->away_team_id) == $team->id ? 'selected' : '' }}>
                                {{ $team->name }} ({{ ucfirst($team->category) }})
                            </option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Fecha y Hora</label>
                    <input type="datetime-local" name="fecha" value="{{ old('fecha') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Sede / Coliseo</label>
                    <input type="text" name="sede" value="{{ old('sede', 'Coliseo Cerrado') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Coliseo Principal de Abancay">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jornada / Fecha #</label>
                    <input type="text" name="jornada" value="{{ old('jornada') }}"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Fecha 1 / Semifinal">
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Estado</label>
                    <select name="estado" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="Programado">Programado</option>
                        <option value="En Curso">En Curso</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>
            </div>

   
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.matches.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Partido
                </button>
            </div>
        </form>
    </div>
</div>
@endsection