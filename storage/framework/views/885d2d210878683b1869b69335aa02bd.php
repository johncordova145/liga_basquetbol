
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
                <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Inicio</a></li>
                <li><a href="<?php echo e(route('matches.public')); ?>" class="<?php echo e(request()->routeIs('matches.public') ? 'active' : ''); ?>">Partidos</a></li>
                <li><a href="<?php echo e(route('news.index')); ?>" class="<?php echo e(request()->routeIs('news.*') ? 'active' : ''); ?>">Noticias</a></li>
                <li><a href="<?php echo e(route('ranking.public')); ?>" class="<?php echo e(request()->routeIs('ranking.public') ? 'active' : ''); ?>">Clasificación</a></li>
                <li><a href="<?php echo e(route('calendar.public')); ?>" class="<?php echo e(request()->routeIs('calendar.public') ? 'active' : ''); ?>">Calendario</a></li>
                <li><a href="#" class="more-btn">Más</a></li>
                <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-link">Panel Admin</a></li>
            </ul>
        </nav>
    </header>


    <section class="hero-banner-section">
        <div class="hero-banner-content">
            <div class="hero-text">
                <span class="hero-badge">CAMPEONATO OFICIAL</span>
                <h1 class="hero-title">Gran Apertura del Torneo de Básquetbol en Abancay</h1>
                <p class="hero-desc">Vive la emoción del deporte ráfaga con los mejores equipos de la región disputando la copa principal en el Coliseo Cerrado.</p>
                <a href="#" class="hero-btn">Leer Más &raquo;</a>
            </div>
            <div class="hero-image">
                <img src="<?php echo e(asset('assets/img/afiches/sele_u19M.jpg')); ?>" alt="Selección U19 Masculino">
            </div>
        </div>

  
        <div class="hero-thumbnails">
            <div class="hero-thumb-card">
                <img src="<?php echo e(asset('assets/img/afiches/vs_1.jfif')); ?>" alt="Partido Superior">
                <span>Partidos de la Fecha - Categoría Superior</span>
            </div>
            <div class="hero-thumb-card">
                <img src="<?php echo e(asset('assets/img/afiches/vs_2.jfif')); ?>" alt="Partido U15">
                <span>Programación Oficial - Categoría U15</span>
            </div>
            <div class="hero-thumb-card">
                <img src="<?php echo e(asset('assets/img/afiches/seleccion.jfif')); ?>" alt="Selección">
                <span>Preparación de Selecciones Locales</span>
            </div>
            <div class="hero-thumb-card">
                <img src="<?php echo e(asset('assets/img/afiches/torneo.jfif')); ?>" alt="Torneo">
                <span>Fases Finales del Torneo Distrital</span>
            </div>
        </div>
    </section>

  
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
                </div>
            </section>
        </div>

        <aside class="right-sidebar">
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Cuadro Torneo Nacional U14</div>
                <img src="<?php echo e(asset('assets/img/afiches/torneo_U14.jpg')); ?>" alt="Cuadro U14">
            </div>

            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Programación del Torneo</div>
                <img src="<?php echo e(asset('assets/img/afiches/torneo.jfif')); ?>" alt="Torneo Fecha">
            </div>

            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Escudo Oficial</div>
                <img src="<?php echo e(asset('assets/img/logos/logo.png')); ?>" alt="Logo Oficial">
            </div>
        </aside>
        <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $standings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4">Tabla de Posiciones - <?php echo e($categoryName); ?></h3>
                
                <div class="overflow-x-auto bg-slate-900 rounded-lg border border-slate-800">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="bg-slate-800 text-xs uppercase text-gray-400">
                            <tr>
                                <th class="px-4 py-3">Pos</th>
                                <th class="px-4 py-3">Equipo</th>
                                <th class="px-4 py-3 text-center">PJ</th>
                                <th class="px-4 py-3 text-center">PG</th>
                                <th class="px-4 py-3 text-center">PP</th>
                                <th class="px-4 py-3 text-center">Pts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $standings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-slate-800 hover:bg-slate-800/50">
                                    <td class="px-4 py-3 font-medium text-white"><?php echo e($index + 1); ?></td>
                                    <td class="px-4 py-3 font-medium text-white flex items-center gap-2">
                                        <?php if($team->shield): ?>
                                            <img src="<?php echo e(asset('storage/' . $team->shield)); ?>" alt="" class="w-6 h-6 object-contain">
                                        <?php endif; ?>
                                        <?php echo e($team->name); ?>

                                    </td>
                                    <td class="px-4 py-3 text-center"><?php echo e($team->played ?? 0); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($team->won ?? 0); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($team->lost ?? 0); ?></td>
                                    <td class="px-4 py-3 text-center font-bold text-yellow-500"><?php echo e($team->points ?? 0); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                        No hay equipos o partidos registrados en esta categoría.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    </main>

    <footer class="site-footer">
        <p>&copy; 2026 Liga Distrital de Basketball Abancay - F.D.P.B. Todos los derechos reservados.</p>
    </footer>

</body>
</html><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/public/home.blade.php ENDPATH**/ ?>