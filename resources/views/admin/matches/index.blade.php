@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Gestión de Partidos</h1>
            <p class="text-sm text-gray-400 mt-1">Administra el calendario, los resultados y las fechas de los encuentros.</p>
        </div>
        <a href="{{ route('admin.matches.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-4 py-2 rounded-lg shadow transition duration-150">
            + Programar Partido
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/60 text-gray-400 uppercase text-xs tracking-wider border-b border-slate-800">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Local</th>
                        <th class="py-3 px-4 text-center">Marcador</th>
                        <th class="py-3 px-4">Visitante</th>
                        <th class="py-3 px-4">Fecha / Hora</th>
                        <th class="py-3 px-4">Sede</th>
                        <th class="py-3 px-4">Estado</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-gray-300 text-sm">
                    @forelse($matches as $match)
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="py-3 px-4 font-medium text-white">{{ $match->id }}</td>
                            
   
                            <td class="py-3 px-4 font-semibold text-white">
                                {{ $match->homeTeam->name ?? 'Local' }}
                            </td>

                            <!-- Marcador -->
                            <td class="py-3 px-4 text-center font-bold text-yellow-400">
                                {{ $match->home_score ?? 0 }} - {{ $match->away_score ?? 0 }}
                            </td>

            
                            <td class="py-3 px-4 font-semibold text-white">
                                {{ $match->awayTeam->name ?? 'Visitante' }}
                            </td>

                            <td class="py-3 px-4 text-gray-400 text-xs">
                                {{ $match->played_at ?? '-' }}
                            </td>

                    
                            <td class="py-3 px-4 text-gray-300">
                                {{ $match->venue ?? 'N/A' }}
                            </td>

                  
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full 
                                    {{ $match->status == 'finished' ? 'bg-green-500/10 text-green-400 border border-green-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                                    {{ ucfirst($match->status ?? 'Programado') }}
                                </span>
                            </td>

                    
                            <td class="py-3 px-4 text-center space-x-2">
                                <a href="{{ route('admin.matches.edit', $match) }}" class="inline-block bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 px-3 py-1 rounded text-xs font-medium">Editar</a>
                                <form action="{{ route('admin.matches.destroy', $match) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este partido?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500/10 text-red-400 hover:bg-red-500/20 px-3 py-1 rounded text-xs font-medium">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-gray-500">No hay partidos programados actualmente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($matches, 'links'))
            <div class="p-4 border-t border-slate-800 bg-slate-950/30">
                {{ $matches->links('vendor.pagination.fiba') }}
            </div>
        @endif
    </div>
</div>
@endsection