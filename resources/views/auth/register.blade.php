@extends('layouts.fiba')

@section('content')
<div class="relative min-h-[85vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-950">
    <div class="absolute inset-0 z-0 opacity-25 bg-cover bg-center" style="background-image: url('{{ asset('images/trophy-bg.jpg') }}');"></div>
    <div class="absolute inset-0 z-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent"></div>

    <div class="relative z-10 w-full max-w-md bg-slate-900/95 backdrop-blur-md rounded-3xl p-8 border border-slate-800 shadow-2xl">
        <div class="mb-4">
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-slate-800 text-slate-300 hover:bg-slate-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-xs font-bold uppercase tracking-widest text-orange-500 mb-1">Liga de Básquetbol</h2>
            <h1 class="text-2xl font-black text-white tracking-wide">Crear una cuenta</h1>
            <p class="text-xs text-slate-400 mt-1">Regístrate para acceder al sistema</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-3 bg-amber-500/10 border border-amber-500/30 rounded-xl text-amber-400 text-xs">
                <p class="font-bold mb-0.5">¡Aviso de registro!</p>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre completo" 
                    class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
            </div>

            <div>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email" 
                    class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
            </div>

            <div>
                <input type="password" name="password" required placeholder="Contraseña" 
                    class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
            </div>

            <div>
                <input type="password" name="password_confirmation" required placeholder="Confirmar contraseña" 
                    class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all">
            </div>

            <button type="submit" class="w-full py-3.5 px-4 bg-[#ccff00] hover:bg-[#b3e600] text-slate-950 font-black rounded-full uppercase tracking-wider text-sm transition-all shadow-lg shadow-[#ccff00]/10 hover:shadow-[#ccff00]/20 mt-2">
                Registrarse
            </button>
        </form>

        <div class="text-center mt-4 text-xs text-slate-400">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Inicia sesión</a>
        </div>
    </div>
</div>
@endsection