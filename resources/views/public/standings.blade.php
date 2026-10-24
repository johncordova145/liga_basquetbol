<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Posiciones - Guerreros del Ampay</title>
    <link rel="stylesheet" href="{{ asset('assets/css/fiba-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>
<body>
    <header>
        <nav class="league-nav">
            <div class="league-brand">
                <img src="{{ asset('assets/img/logos/logo.png') }}" alt="Logo">
                <span>GUERREROS DEL AMPAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="#" class="active">Clasificación</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content-layout" style="grid-template-columns: 1fr;">
        <section class="poster-banner-section">
            <h3 class="section-header-title">Tabla de Posiciones Oficial</h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; color: #fff; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 2px solid #333; color: #ffb703;">
                            <th style="padding: 12px;">Pos</th>
                            <th style="padding: 12px;">Equipo</th>
                            <th style="padding: 12px;">PJ</th>
                            <th style="padding: 12px;">PG</th>
                            <th style="padding: 12px;">PP</th>
                            <th style="padding: 12px;">PTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de filas estáticas o dinámicas -->
                        <tr style="border-bottom: 1px solid #222;">
                            <td style="padding: 12px;">1</td>
                            <td style="padding: 12px;">Club Miguel Grau</td>
                            <td style="padding: 12px;">0</td>
                            <td style="padding: 12px;">0</td>
                            <td style="padding: 12px;">0</td>
                            <td style="padding: 12px;">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <p>&copy; 2026 Liga Distrital de Basketball Abancay - F.D.P.B. Todos los derechos reservados.</p>
    </footer>
</body>
</html>