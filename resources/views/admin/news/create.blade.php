@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Crear Nueva Noticia</h1>
            <p class="text-sm text-gray-400 mt-1">Publica comunicados oficiales, fichajes o resúmenes para la liga.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-gray-300 text-sm font-medium rounded-lg">
            ← Volver al Listado
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Título de la Noticia</label>
                <input type="text" name="title" value="{{ old('title') }}" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500" 
                    placeholder="Ej. Presentación de los partidos">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Extracto / Resumen</label>
                <textarea name="excerpt" rows="2" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500" 
                    placeholder="Breve descripción...">{{ old('excerpt') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Imagen de la Noticia</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-slate-950 hover:file:bg-yellow-400">
            </div>


            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Cuerpo del Comunicado</label>
                <textarea name="content" rows="6" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500" 
                    placeholder="Contenido completo...">{{ old('content') }}</textarea>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_published" id="is_published" value="1" checked
                    class="w-4 h-4 text-yellow-500 bg-slate-950 border-slate-700 rounded focus:ring-yellow-500">
                <label for="is_published" class="ml-2 text-sm font-medium text-gray-300">Publicar inmediatamente</label>
            </div>

            <div class="flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.news.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg">
                    Guardar Noticia
                </button>
            </div>
        </form>
    </div>
</div>
@endsection