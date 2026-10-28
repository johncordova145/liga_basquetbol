@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Gestión de Equipos</h1>
            <p class="text-sm text-gray-400 mt-1">Administra los clubes locales y sus datos oficiales.</p>
        </div>
        <a href="{{ route('admin.teams.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-4 py-2 rounded-lg shadow transition duration-150">
            + Nuevo Equipo
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/60 text-gray-400 uppercase text-xs tracking-wider border-b border-slate-800">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Código</th>
                        <th class="py-3 px-4">Categoría</th>
                        <th class="py-3 px-4">Zona</th>
                        <th class="py-3 px-4">Ciudad</th>
                        <th class="py-3 px-4">Entrenador</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-gray-300 text-sm">
                    @forelse($teams as $team)
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="py-3 px-4 font-medium text-white">{{ $team->id }}</td>
                            <td class="py-3 px-4 font-semibold text-white">{{ $team->name }}</td>
                            <td class="py-3 px-4 text-gray-400">{{ $team->code }}</td>
                            <td class="py-3 px-4">{{ $team->category }}</td>
                            <td class="py-3 px-4">{{ $team->zone }}</td>
                            <td class="py-3 px-4">{{ $team->city ?? 'Abancay' }}</td>
                            <td class="py-3 px-4">{{ $team->coach }}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <a href="{{ route('admin.teams.edit', $team) }}" class="inline-block bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 px-3 py-1 rounded text-xs font-medium transition">Editar</a>
                                <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500/10 text-red-400 hover:bg-red-500/20 px-3 py-1 rounded text-xs font-medium transition" onclick="return confirm('¿Desea eliminar este equipo?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-gray-500">No hay equipos registrados actualmente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

     
        @if(method_exists($teams, 'links'))
            <div class="p-4 border-t border-slate-800 bg-slate-950/30">
                {{ $teams->links('vendor.pagination.fiba') }}
            </div>
        @endif
    </div>
</div>
@endsection