@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <div class="flex justify-between items-center mb-6">
        
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos oficiales del club para la liga.</p>
        </div>
        <a href="{{ route('admin.teams.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">

        </a>
    </div>


    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="name" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-white" placeholder="Ej. Club Deportivo UTEA">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Logo o Escudo del Equipo</label>
                    <input type="file" name="flag" accept="image/*" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-slate-950 hover:file:bg-yellow-400 transition">
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="code" value="{{ old('codigo') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. TIT">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="category" value="{{ old('categoria') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Mayores / Sub-18">
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zone" value="{{ old('zona') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Centro / Norte">
                </div>

             
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="city" value="{{ old('ciudad', 'Abancay') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Abancay">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="coach" value="{{ old('entrenador') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Nombre del DT">
                </div>

            
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="founded" value="{{ old('founded') }}"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 2020">
                </div>

                

           
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.teams.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos oficiales del club para la liga.</p>
        </div>
        <a href="{{ route('admin.teams.index') }}" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
       
        </a>
    </div>


    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    </form>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
       
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Titanes de Abancay">
                </div>

               
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="code" value="{{ old('code') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. TIT">
                </div>

              
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="category" value="{{ old('category') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Mayores / Sub-18">
                </div>

            
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zone" value="{{ old('zone') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Centro / Norte">
                </div>

            
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="city" value="{{ old('city', 'Abancay') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Abancay">
                </div>

           
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="coach" value="{{ old('coach') }}" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Nombre del DT">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="founded" value="{{ old('founded') }}"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 2020">
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Logo</label>
                    <input type="file" name="flag" accept="image/*" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-slate-950 hover:file:bg-yellow-400 transition">
                        
                </div>
            </div>

          
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="{{ route('admin.teams.index') }}" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection