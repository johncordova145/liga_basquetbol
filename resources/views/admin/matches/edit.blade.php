@extends('layouts.admin')

@section('content')
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
    <h2 class="text-xl font-bold text-white mb-1">Editar Partido</h2>
    <p class="text-sm text-gray-400 mb-6">Actualiza la información, horarios o marcadores del encuentro.</p>

    <form action="{{ route('admin.matches.update', $match) }}" method="POST">
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
                <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Local</label>
                <select name="home_team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('home_team_id', $match->home_team_id) == $team->id ? 'selected' : '' }}>
                            {{ $team->name }} ({{ ucfirst($team->category) }})
                        </option>
                    @endforeach
                </select>
            </div>

    
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Visitante</label>
                <select name="away_team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('away_team_id', $match->away_team_id) == $team->id ? 'selected' : '' }}>
                            {{ $team->name }} ({{ ucfirst($team->category) }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fecha y Hora (`played_at`)</label>
                <input type="datetime-local" name="played_at" value="{{ old('played_at', date('Y-m-d\TH:i', strtotime($match->played_at))) }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>

    
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fase / Jornada (`stage`)</label>
                <input type="text" name="stage" value="{{ old('stage', $match->stage) }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Sede / Coliseo (`venue`)</label>
                <input type="text" name="venue" value="{{ old('venue', $match->venue) }}" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>

   
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Estado (`status`)</label>
                <select name="status" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    <option value="scheduled" {{ old('status', $match->status) == 'scheduled' ? 'selected' : '' }}>Programado</option>
                    <option value="finished" {{ old('status', $match->status) == 'finished' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-2">Canastas Local</label>
                    <input type="number" name="home_score" value="{{ old('home_score', $match->home_score) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2.5 text-white">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-2">Canastas Visit.</label>
                    <input type="number" name="away_score" value="{{ old('away_score', $match->away_score) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2.5 text-white">
                </div>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
            <a href="{{ route('admin.matches.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white">
                Cancelar
            </a>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg">
                Actualizar Partido
            </button>
        </div>
    </form>
</div>
@endsection