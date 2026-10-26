@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Jugador</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos del deportista y asígnalo a su equipo.</p>
        </div>
        <a href="{{ route('admin.players.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>

    
    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.players.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre Completo</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Carlos Mendoza">
                </div>

            
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Equipo</label>
                    <select name="team_id" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione un equipo</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                                {{ $team->name }} ({{ ucfirst($team->category) }})
                            </option>
                        @endforeach
                    </select>
                </div>

              
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Número de Camiseta (#)</label>
                    <input type="number" name="numero" value="{{ old('numero') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 23">
                </div>

               
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Posición</label>
                    <select name="posicion" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione la posición</option>
                        <option value="Base">Base (Point Guard)</option>
                        <option value="Escolta">Escolta (Shooting Guard)</option>
                        <option value="Alero">Alero (Small Forward)</option>
                        <option value="Ala-Pívot">Ala-Pívot (Power Forward)</option>
                        <option value="Pívot">Pívot (Center)</option>
                    </select>
                </div>

           
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Edad</label>
                    <input type="number" name="edad" value="{{ old('edad') }}"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 21">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Estatura (m)</label>
                    <input type="text" name="estatura" value="{{ old('estatura') }}"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 1.85m">
                </div>
            </div>

         
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.players.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Jugador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection