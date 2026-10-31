@extends('layouts.fiba')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-white mb-6">Calendario de Partidos</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        

        <div class="lg:col-span-2 space-y-6">
            

            <div class="bg-gray-900 border border-gray-800 rounded-lg p-4">
                <div class="flex space-x-6 text-sm font-semibold">
                    <a href="{{ route('calendar.public', ['categoria' => 'mayores', 'mes' => request('mes')]) }}" 
                        class="{{ (request('categoria', 'mayores') == 'mayores') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2' }}">
                        Mayores
                    </a>
                    <a href="{{ route('calendar.public', ['categoria' => 'u19', 'mes' => request('mes')]) }}" 
                        class="{{ (request('categoria') == 'u19') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2' }}">
                        U19
                    </a>
                    <a href="{{ route('calendar.public', ['categoria' => 'u14', 'mes' => request('mes')]) }}" 
                        class="{{ (request('categoria') == 'u14') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2' }}">
                        U14
                    </a>
                </div>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-lg p-4 flex justify-between items-center text-white">
                <a href="{{ route('calendar.public', ['mes' => $prev ?? '']) }}" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 rounded text-sm">&larr; Mes Anterior</a>
                <span class="font-bold text-orange-400 capitalize">
                    {{ isset($month) ? $month->translatedFormat('F Y') : 'Mes Actual' }}
                </span>
                <a href="{{ route('calendar.public', ['mes' => $next ?? '']) }}" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 rounded text-sm">Mes Siguiente &rarr;</a>
            </div>


            @isset($days)
                @forelse($days as $dateString => $matchesOnDay)
                    <div class="bg-gray-900 border border-gray-800 rounded-lg p-4 text-white shadow">
                        <div class="flex items-center justify-between mb-3 pb-2 border-b border-gray-800">
                            <span class="font-bold text-orange-400 text-sm uppercase">
                                {{ \Carbon\Carbon::parse($dateString)->translatedFormat('l, d \d\e F \d\e Y') }}
                            </span>
                            <span class="text-xs bg-gray-800 px-2 py-0.5 rounded text-gray-300">
                                {{ count($matchesOnDay) }} partidos
                            </span>
                        </div>

                        <div class="space-y-3">
                            @foreach($matchesOnDay as $match)
                                <div class="bg-gray-950 border border-gray-800/80 rounded-lg p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-center bg-gray-900 px-3 py-2 rounded border border-gray-800">
                                            <span class="block text-xs text-gray-400 font-semibold">HORA</span>
                                            <span class="block text-sm font-bold text-orange-400">
                                                {{ \Carbon\Carbon::parse($match->played_at)->format('H:i') }}
                                            </span>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-white text-base">
                                                {{ $match->homeTeam->name ?? 'Local' }} 
                                                @if($match->status === 'finished')
                                                    <span class="mx-2 text-orange-400 font-extrabold">{{ $match->home_score }} - {{ $match->away_score }}</span>
                                                @else
                                                    <span class="text-gray-500 mx-2 text-sm font-normal">vs</span>
                                                @endif
                                                {{ $match->awayTeam->name ?? 'Visita' }}
                                            </h3>
                                            <p class="text-xs text-gray-400 mt-1">
                                                Coliseo Cerrado de Abancay • Categoría: <span class="uppercase font-semibold text-gray-300">{{ $match->category }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-0">
                                        @if($match->status === 'finished')
                                            <span class="text-xs px-2.5 py-1 bg-green-950 border border-green-800 text-green-300 rounded font-semibold">Finalizado</span>
                                        @else
                                            <span class="text-xs px-2.5 py-1 bg-blue-950 border border-blue-800 text-blue-300 rounded font-semibold">Programado</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-900 border border-gray-800 rounded-lg p-6 text-center text-gray-400">
                        No hay partidos programados para este mes. Usa los botones de mes anterior/siguiente para explorar las fechas.
                    </div>
                @endforelse
            @endisset
        </div>

   
        <div class="space-y-6">
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-5 text-white">
                <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-800">
                    <div class="w-8 h-8 rounded-full bg-orange-600 flex items-center justify-center font-bold text-xs">GA</div>
                    <div>
                        <h4 class="font-bold text-sm">Guerreros del Ampay</h4>
                        <p class="text-xs text-gray-400">LIGA OFICIAL</p>
                    </div>
                </div>

                <h3 class="font-bold text-base mb-4">Últimas Noticias</h3>

                <div class="space-y-4">
                    <a href="{{ route('news.index') }}" class="block group">
                        <h5 class="text-xs font-semibold text-gray-200 group-hover:text-orange-400 transition">Titanes de Abancay domina la jornada de básquet mayores en el coliseo local.</h5>
                        <span class="text-[10px] text-gray-500 mt-1 block">Ayer</span>
                    </a>
                    <hr class="border-gray-800">
                    <a href="{{ route('news.index') }}" class="block group">
                        <h5 class="text-xs font-semibold text-gray-200 group-hover:text-orange-400 transition">Leones de Andahuaylas se alistan para el gran clásico regional de vuelta.</h5>
                        <span class="text-[10px] text-gray-500 mt-1 block">Hace 3 días</span>
                    </a>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-800 text-center">
                    <a href="{{ route('news.index') }}" class="block w-full py-2.5 bg-transparent border border-orange-500 text-orange-400 hover:bg-orange-500 hover:text-white transition rounded text-xs font-bold uppercase tracking-wider">
                        Ver todas las noticias
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection