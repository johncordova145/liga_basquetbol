<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Liga de Básquetbol</title>
    <link rel="stylesheet" href="{{ asset('assets/css/fiba-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h2>Admin Liga</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.teams.index') }}">Equipos</a>
                <a href="{{ route('admin.players.index') }}">Jugadores</a>
                <a href="{{ route('admin.matches.index') }}">Partidos</a>
                <a href="{{ route('admin.news.index') }}">Noticias</a>
            </nav>
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">Cerrar Sesión</button>
                </form>
            </div>
        </aside>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/js/admin-actions.js') }}"></script>
</body>
</html>