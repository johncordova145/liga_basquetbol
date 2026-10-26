@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Crear Nueva Noticia</h1>
            <p class="text-sm text-gray-400 mt-1">Publica comunicados oficiales, fichajes o resúmenes para la liga.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>


    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.news.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
               
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Título del Comunicado</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Arranca la Gran Final de la Liga de Básquetbol">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
               
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                        <select name="categoria" required
                            class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                            <option value="Comunicado">Comunicado Oficial</option>
                            <option value="Resultado">Resumen de Fecha</option>
                            <option value="Fichaje">Fichajes y Clubes</option>
                            <option value="Evento">Evento Especial</option>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">URL o Ruta de la Imagen</label>
                        <input type="text" name="imagen" value="{{ old('imagen') }}"
                            class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                            placeholder="Imagen destacada del artículo">
                    </div>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Contenido de la Noticia</label>
                    <textarea name="contenido" rows="6" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Escribe los detalles completos del comunicado..."></textarea>
                </div>
            </div>


            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.news.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Publicar Noticia
                </button>
            </div>
        </form>
    </div>
</div>
@endsection