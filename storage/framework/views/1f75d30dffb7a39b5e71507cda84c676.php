<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga Oficial de Básquetbol - Guerreros del Ampay</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fiba-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home.css')); ?>">
</head>
<body>

    <header>
        <nav class="league-nav">
            <div class="league-brand">
                <img src="<?php echo e(asset('assets/img/logos/logo.png')); ?>" alt="Logo">
                <span>GUERREROS DEL AMPAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Inicio</a></li>
                <li><a href="#">Partidos</a></li>
                <li><a href="#">Noticias</a></li>
                <li><a href="#">Clasificación</a></li>
                <li><a href="#">Calendario</a></li>
                <li><a href="#" class="more-btn">Más</a></li>
                <li><a href="/admin/dashboard" class="admin-link">Panel Admin</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content-layout">
        <div class="left-column">
            <section class="poster-banner-section">
                <h3 class="section-header-title">PRÓXIMOS ENFRENTAMIENTOS Y PROGRAMACIÓN</h3>
                <div class="poster-grid">
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/vs_1.jfif')); ?>" alt="Partido Superior">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/vs_2.jfif')); ?>" alt="Partido U15">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/seleccion.jfif')); ?>" alt="Selección y Competencia">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/torneo.jfif')); ?>" alt="Torneo Nacional">
                    </div>
                </div>
            </section>

            <section class="teams-gallery-block">
                <h3 class="section-header-title">EQUIPOS Y SELECCIONES</h3>
                <div class="teams-grid">
                    <div class="team-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/sele_u19M.jpg')); ?>" alt="Selección U19 Masculino">
                        <div class="team-card-title">Selección U19 Masculino</div>
                    </div>
                    <div class="team-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/sele_u19F.jpg')); ?>" alt="Selección U19 Femenino">
                        <div class="team-card-title">Selección U19 Femenino</div>
                    </div>
                    <div class="team-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/EFODEC.jpg')); ?>" alt="Club EFODEC">
                        <div class="team-card-title">Club EFODEC</div>
                    </div>
                    <div class="team-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/MG.jpg')); ?>" alt="Club Miguel Grau">
                        <div class="team-card-title">Club Miguel Grau</div>
                    </div>
                </div>
            </section>

            <section class="leaders-section-block">
                <h3 class="section-header-title">LÍDERES Y MÁXIMOS ANOTADORES</h3>
                <div class="leaders-grid">
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/lider_u19.jfif')); ?>" alt="Líderes U19">
                    </div>
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/max_anota_u19.jfif')); ?>" alt="Máximas Anotadoras U19">
                    </div>
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/anotadores_1.jfif')); ?>" alt="Máximos Anotadores Varones">
                    </div>
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/anotadores_3p.jfif')); ?>" alt="Tripleros Varones">
                    </div>
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/anotadoras_1.jfif')); ?>" alt="Máximas Anotadoras Damas">
                    </div>
                    <div class="leader-card-img">
                        <img src="<?php echo e(asset('assets/img/afiches/anotadoras_3pt.jfif')); ?>" alt="Tripleras Damas">
                    </div>
                </div>
            </section>
        </div>

        <aside class="right-sidebar">
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Programación del Torneo</div>
                <img src="<?php echo e(asset('assets/img/afiches/torneo.jfif')); ?>" alt="Torneo Fecha">
            </div>

            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Escudo Oficial</div>
                <img src="<?php echo e(asset('assets/img/logos/logo.png')); ?>" alt="Logo Oficial">
            </div>
        </aside>
    </main>

    <footer class="site-footer">
        <p>&copy; 2026 Liga Distrital de Basketball Abancay - F.D.P.B. Todos los derechos reservados.</p>
    </footer>

</body>
</html><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/welcome.blade.php ENDPATH**/ ?>