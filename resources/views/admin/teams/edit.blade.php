@extends('layouts.admin')

@section('content')
@if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Editar Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Modifica los datos oficiales del club.</p>
        </div>
        <a href="{{ route('admin.teams.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            Volver al Listado
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.teams.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
     
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="name" value="{{ old('name', $team->name) }}" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

    
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Logo o Escudo del Equipo</label>
                    <input type="file" name="flag" accept="image/*" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-slate-950 hover:file:bg-yellow-400">
                    @if($team->flag)
                        <p class="text-xs text-gray-400 mt-2">Imagen actual: {{ $team->flag }}</p>
                    @endif
                </div>

       
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="code" value="{{ old('code', $team->code) }}" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

      
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="category" value="{{ old('category', $team->category) }}" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

        
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zone" value="{{ old('zone', $team->zone) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

      
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="city" value="{{ old('city', $team->city) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="coach" value="{{ old('coach', $team->coach) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="founded" value="{{ old('founded', $team->founded) }}" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.teams.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition">
                    Actualizar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection