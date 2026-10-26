@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-8 border-b border-gray-800 pb-4">
        <h1 class="text-2xl font-bold text-white">Panel de Control</h1>
        <p class="text-sm text-gray-400">Resumen general de la Liga de Básquetbol</p>
    </div>

    <!-- Tarjetas de Estadísticas usando las variables del controlador -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        @foreach($stats as $stat)
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-5">
                <h3 class="text-gray-400 text-xs font-semibold uppercase">{{ $stat['label'] }}</h3>
                <p class="text-3xl font-extrabold text-orange-400 mt-2">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-lg p-6">
        <h2 class="text-lg font-bold text-white mb-4">Gestión Rápida</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('admin.teams.index') }}" class="p-4 bg-gray-950 border border-gray-800 rounded-lg hover:border-orange-500 transition text-center block">
                <span class="block font-bold text-white mb-1">Equipos</span>
                <span class="text-xs text-gray-400">Administrar clubes locales</span>
            </a>
            <a href="{{ route('admin.matches.index') }}" class="p-4 bg-gray-950 border border-gray-800 rounded-lg hover:border-orange-500 transition text-center block">
                <span class="block font-bold text-white mb-1">Partidos</span>
                <span class="text-xs text-gray-400">Programación y marcadores</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="p-4 bg-gray-950 border border-gray-800 rounded-lg hover:border-orange-500 transition text-center block">
                <span class="block font-bold text-white mb-1">Noticias</span>
                <span class="text-xs text-gray-400">Publicar comunicaciones</span>
            </a>
        </div>
    </div>
</div>
@endsection