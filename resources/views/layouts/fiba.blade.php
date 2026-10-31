<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga Oficial de Básquetbol - Guerreros del Ampay</title>
    <link rel="stylesheet" href="{{ asset('assets/css/fiba-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white">


    <header>
        <nav class="league-nav">
            <div class="league-brand">
                <img src="{{ asset('assets/img/logos/logo.png') }}" alt="Logo">
                <span>GUERREROS DEL AMPAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="{{ route('matches.public') }}" class="{{ request()->routeIs('matches.public') ? 'active' : '' }}">Partidos</a></li>
                <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news') ? 'active' : '' }}">Noticias</a></li>
                <li><a href="{{ route('ranking.public') }}" class="{{ request()->routeIs('ranking.public') ? 'active' : '' }}">Clasificación</a></li>
                <li><a href="{{ route('calendar.public') }}" class="{{ request()->routeIs('calendar.public') ? 'active' : '' }}">Calendario</a></li>
                @include('layouts.nav')
                
            </ul>
        </nav>
    </header>

    <main class="py-6">
        @yield('content')
    </main>

</body>
</html>