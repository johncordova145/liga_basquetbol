<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos y Resultados - Guerreros del Ampay</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fiba-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/matches.css')); ?>">
</head>
<body>

    <header>
        <nav class="league-nav">
            <div class="league-brand">
                <img src="<?php echo e(asset('assets/img/logos/logo.png')); ?>" alt="Logo">
                <span>GUERREROS DEL AMPAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
                <li><a href="<?php echo e(route('matches.public')); ?>" class="active">Partidos</a></li>
                <li><a href="<?php echo e(route('news.index')); ?>">Noticias</a></li>
                <li><a href="<?php echo e(route('ranking.public')); ?>">Clasificación</a></li>
                <li><a href="<?php echo e(route('calendar.public')); ?>">Calendario</a></li>
                <li><a href="#" class="more-btn">Más</a></li>
                <li><a href="/admin/dashboard" class="admin-link">Panel Admin</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero-ticker-bar">
        <div class="ticker-track">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $categoryMatches): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $categoryMatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ticker-item">
                        <span class="ticker-date"><?php echo e($match->played_at->format('M j @ g:i A')); ?></span>
                        <span class="ticker-teams"><?php echo e($match->homeTeam->name ?? 'Local'); ?> vs <?php echo e($match->awayTeam->name ?? 'Visita'); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <main class="main-content-layout" style="grid-template-columns: 1fr 420px;">
        
        <div class="left-column">
            <section class="poster-banner-section">
                
                <div class="date-filter-wrapper" style="margin-bottom: 25px;">
                    <form method="GET" action="<?php echo e(route('matches.public')); ?>" class="date-filter-form" style="width: 100%;">
                        <label for="fecha" class="filter-label">Filtrar por Fecha</label>
                        <div class="filter-input-group" style="display: flex; gap: 10px; margin-top: 5px;">
                            <input type="date" id="fecha" name="fecha" value="<?php echo e($selected->toDateString()); ?>" class="date-input-field" style="flex: 1;" onchange="this.form.submit()">
                            <a href="<?php echo e(route('matches.public')); ?>" class="reset-filters-btn" style="align-self: center;">Reiniciar</a>
                        </div>
                    </form>
                </div>

                <h3 class="section-header-title">Partidos del Día: <?php echo e($selected->translatedFormat('d \d\e F, Y')); ?></h3>

                <?php $__empty_1 = true; $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $categoryMatches): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div style="margin-bottom: 25px;">
                        <h4 style="color: #ffb703; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 12px; border-bottom: 1px solid #333; padding-bottom: 6px;">Categoría: <?php echo e($category); ?></h4>
                        
                        <?php $__currentLoopData = $categoryMatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="match-card-item">
                                <div class="match-card-header"><?php echo e(strtoupper($match->stage ?? 'FASE DE GRUPOS')); ?></div>
                                <div class="match-team-row">
                                    <span class="match-team-name"><?php echo e($match->homeTeam->name); ?></span>
                                    <span class="match-team-score"><?php echo e($match->status == 2 ? $match->home_score : $match->played_at->format('g:i A')); ?></span>
                                </div>
                                <div class="match-team-row">
                                    <span class="match-team-name"><?php echo e($match->awayTeam->name); ?></span>
                                    <span class="match-team-score" style="color: <?php echo e($match->status == 2 ? '#fff' : '#ffb703'); ?>;"><?php echo e($match->status == 2 ? $match->away_score : 'Coliseo Cerrado'); ?></span>
                                </div>
                                <div class="match-card-footer"><?php echo e($match->status == 2 ? 'TERMINADO' : 'PROGRAMADO'); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align: center; padding: 40px; color: #888;">
                        <p>No hay partidos programados para esta fecha.</p>
                    </div>
                <?php endif; ?>

            </section>
        </div>

        <aside class="right-sidebar" style="width: 100%;">
            <div class="sidebar-widget">
                <div class="sidebar-widget-title" style="margin-bottom: 15px;">Galería y Afiches Oficiales</div>
                <div class="poster-grid">
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/torneo_U14.jpg')); ?>" alt="Torneo U14">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/torneo.jfif')); ?>" alt="Torneo Oficial">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/vs_1.jfif')); ?>" alt="Enfrentamiento Fecha">
                    </div>
                    <div class="poster-card">
                        <img src="<?php echo e(asset('assets/img/afiches/vs_2.jfif')); ?>" alt="Enfrentamiento U15">
                    </div>
                </div>
            </div>
        </aside>

    </main>

    <footer class="site-footer">
        <p>&copy; 2026 Liga Distrital de Basketball Abancay - F.D.P.B. Todos los derechos reservados.</p>
    </footer>

</body>
</html><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/public/matches.blade.php ENDPATH**/ ?>