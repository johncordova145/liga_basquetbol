@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Gestión de Noticias</h1>
            <p class="text-sm text-gray-400 mt-1">Crea, edita y publica comunicados oficiales de la liga.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-4 py-2 rounded-lg shadow transition duration-150">
            + Nueva Noticia
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-950/60 text-gray-400 uppercase text-xs tracking-wider border-b border-slate-800">
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Título</th>
                        <th class="py-3 px-4">Categoría</th>
                        <th class="py-3 px-4">Fecha de Publicación</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-gray-300 text-sm">
                    @forelse($news as $item)
                        <tr class="hover:bg-slate-800/50 transition">
                            <td class="py-3 px-4 font-medium text-white">{{ $item->id }}</td>
                            <td class="py-3 px-4 font-semibold text-white">{{ $item->titulo }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                    {{ $item->categoria ?? 'Comunicado' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-400 text-xs">{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <a href="{{ route('admin.news.edit', $item) }}" class="inline-block bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 px-3 py-1 rounded text-xs font-medium transition">Editar</a>
                                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500/10 text-red-400 hover:bg-red-500/20 px-3 py-1 rounded text-xs font-medium transition" onclick="return confirm('¿Desea eliminar esta noticia?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">No hay noticias publicadas actualmente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($news, 'links'))
            <div class="p-4 border-t border-slate-800 bg-slate-950/30">
                {{ $news->links('vendor.pagination.fiba') }}
            </div>
        @endif
    </div>
</div>
@endsection