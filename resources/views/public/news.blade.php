@extends('layouts.fiba')

@section('content')
<div class="bg-[#0f172a] text-white min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <h2 class="text-2xl font-bold mb-4 tracking-wide">Noticias más importantes</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
            @forelse($featuredNews as $index => $item)
                <div class="relative group rounded-xl overflow-hidden bg-gray-800 shadow-md {{ $index == 0 ? 'md:col-span-2 md:row-span-1' : '' }}">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/default-news.jpg') }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition duration-300 opacity-80 group-hover:opacity-100">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent p-5 flex flex-col justify-end">
                        <span class="text-xs font-semibold uppercase tracking-wider text-red-500 mb-1">
                            {{ $item->category ?? 'Liga de Básquet' }}
                        </span>
                        <h3 class="text-lg md:text-xl font-bold leading-snug">
                            <a href="#" class="hover:underline">{{ $item->title }}</a>
                        </h3>
                        @if($index == 0)
                            <p class="text-sm text-gray-300 mt-2 line-clamp-2">{{ $item->excerpt }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-gray-800 p-6 rounded-xl text-center text-gray-400">
                    No hay noticias destacadas por el momento.
                </div>
            @endforelse
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            

            <div class="lg:col-span-2">
                <h2 class="text-xl font-bold mb-4">Todas las noticias</h2>

                <form method="GET" action="{{ route('news.index') }}" class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-6">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Buscando un artículo..." 
                               class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:border-red-500">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </form>


                <div class="space-y-6">
                    @forelse($news as $item)
                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 flex flex-col md:flex-row gap-5 hover:border-gray-700 transition">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full md:w-52 h-36 object-cover rounded-lg flex-shrink-0">
                            @else
                                <div class="w-full md:w-52 h-36 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0 text-gray-500">
                                    Sin Imagen
                                </div>
                            @endif

                            <div class="flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-1">
                                        <span class="font-semibold text-red-400">{{ $item->category ?? 'Noticia' }}</span>
                                        <span>•</span>
                                        <span>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->diffForHumans() : '' }}</span>
                                    </div>
                                    <h3 class="text-base md:text-lg font-bold text-white hover:text-red-400 transition leading-snug">
                                        <a href="#">{{ $item->title }}</a>
                                    </h3>
                                    <p class="text-sm text-gray-400 mt-2 line-clamp-2">
                                        {{ $item->excerpt }}
                                    </p>
                                </div>

                                <div class="mt-3 flex items-center text-xs text-gray-500 font-semibold uppercase tracking-wider">
                                    <span>2 min de lectura</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-gray-900 border border-gray-800 rounded-xl p-8 text-center text-gray-400">
                            No se encontraron noticias que coincidan con la búsqueda.
                        </div>
                    @endforelse

  
                    <div class="mt-6">
                        {{ $news->appends(request()->query())->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>


            <div>
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 sticky top-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tabla General</span>
                        <span class="text-xs text-red-500 font-bold uppercase">Liga Basket</span>
                    </div>

                    <h3 class="font-bold text-base text-white mb-4">Ranking de Equipos</h3>

                    <div class="space-y-3">
                        @forelse($rankingTeams as $key => $team)
                            <div class="flex items-center justify-between p-2 rounded bg-gray-800/50 border border-gray-800">
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-sm w-4 text-center text-gray-400">{{ $key + 1 }}</span>
                                    <span class="font-semibold text-sm text-white">{{ $team->name }}</span>
                                </div>
                                <span class="text-xs px-2 py-0.5 rounded bg-gray-700 text-gray-300 uppercase font-mono">
                                    {{ $team->code ?? 'LIGA' }}
                                </span>
                            </div>
                        @empty
                            <p class="text-xs text-gray-500">No hay equipos registrados.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection