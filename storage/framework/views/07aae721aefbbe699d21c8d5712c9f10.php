<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga Oficial de Básquetbol - Guerreros del Ampay</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fiba-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home.css')); ?>">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white">


    <header>
        <nav class="league-nav">
            <div class="league-brand">
                <img src="<?php echo e(asset('assets/img/logos/logo.png')); ?>" alt="Logo">
                <span>GUERREROS DEL AMPAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Inicio</a></li>
                <li><a href="<?php echo e(route('matches.public')); ?>" class="<?php echo e(request()->routeIs('matches.public') ? 'active' : ''); ?>">Partidos</a></li>
                <li><a href="<?php echo e(route('news.index')); ?>" class="<?php echo e(request()->routeIs('news') ? 'active' : ''); ?>">Noticias</a></li>
                <li><a href="<?php echo e(route('ranking.public')); ?>" class="<?php echo e(request()->routeIs('ranking.public') ? 'active' : ''); ?>">Clasificación</a></li>
                <li><a href="<?php echo e(route('calendar.public')); ?>" class="<?php echo e(request()->routeIs('calendar.public') ? 'active' : ''); ?>">Calendario</a></li>
                <li><a href="#" class="more-btn">Más</a></li>
            </ul>
        </nav>
    </header>

    <main class="py-6">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/layouts/fiba.blade.php ENDPATH**/ ?>