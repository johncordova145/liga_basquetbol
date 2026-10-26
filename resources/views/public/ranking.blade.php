@extends('layouts.fiba')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-white mb-6">Clasificación de la Liga</h1>


    <div class="flex space-x-4 mb-6">
        @foreach($panels as $key => $panel)
            <a href="{{ route('ranking.public', ['categoria' => $key]) }}" 
               class="px-4 py-2 rounded {{ $active === $key ? 'bg-orange-500 text-white font-bold' : 'bg-gray-800 text-gray-300' }}">
                {{ $panel['label'] }}
            </a>
        @endforeach
    </div>


    @if(isset($panels[$active]))
        <div class="bg-gray-900 rounded-lg p-6 shadow-md border border-gray-800 text-white">
            <h2 class="text-2xl font-semibold mb-4">{{ $panels[$active]['label'] }} - Tabla General</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-800 text-gray-400">
                            <th class="py-2 px-3">Equipo</th>
                            <th class="py-2 px-3">PJ</th>
                            <th class="py-2 px-3">PG</th>
                            <th class="py-2 px-3">PP</th>
                            <th class="py-2 px-3">PF</th>
                            <th class="py-2 px-3">PC</th>
                            <th class="py-2 px-3">DIF</th>
                            <th class="py-2 px-3">Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($panels[$active]['overall'] as $team)
                            <tr class="border-b border-gray-800/50 hover:bg-gray-800/30">
                                <td class="py-3 px-3 font-semibold">{{ $team->name ?? $team->equipo ?? 'Equipo' }}</td>
                                <td class="py-3 px-3">{{ $team->jugados ?? $team->pj ?? 0 }}</td>
                                <td class="py-3 px-3">{{ $team->ganados ?? $team->pg ?? 0 }}</td>
                                <td class="py-3 px-3">{{ $team->perdidos ?? $team->pp ?? 0 }}</td>
                                <td class="py-3 px-3">{{ $team->pf ?? 0 }}</td>
                                <td class="py-3 px-3">{{ $team->pc ?? 0 }}</td>
                                <td class="py-3 px-3">{{ ($team->pf ?? 0) - ($team->pc ?? 0) }}</td>
                                <td class="py-3 px-3 font-bold text-orange-400">{{ $team->puntos ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection