<div class="flex items-center space-x-4">
    @auth

        <span class="text-slate-300 text-sm">Hola, {{ Auth::user()->name }}</span>
        
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-xs uppercase tracking-wider text-red-400 hover:text-red-300 font-bold transition-colors">
                Cerrar Sesión
            </button>
        </form>
    @else

        <a href="{{ route('login') }}" class="text-xs uppercase tracking-wider text-slate-300 hover:text-white font-bold transition-colors">
            Iniciar Sesión
        </a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-[#ccff00] hover:bg-[#b3e600] text-slate-950 font-black rounded-full uppercase tracking-wider text-xs transition-all shadow-lg shadow-[#ccff00]/10">
            Registrarse
        </a>
    @endauth
</div>