<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Liga de Básquetbol</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/fiba-theme.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home.css')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/matches.css')); ?>">
    
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <h2>Admin Liga</h2>
            </div>
            <nav class="sidebar-nav">
                <a href="<?php echo e(url('/admin')); ?>">PANEL ADMIN</a>
                <a href="<?php echo e(route('admin.teams.index')); ?>">Equipos</a>
                <a href="<?php echo e(route('admin.players.index')); ?>">Jugadores</a>
                <a href="<?php echo e(route('admin.matches.index')); ?>">Partidos</a>
                <a href="<?php echo e(route('admin.news.index')); ?>">Noticias</a>
            </nav>
            <div class="sidebar-footer">
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-slate-800 hover:text-white rounded-lg">  
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <main class="admin-content">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="<?php echo e(asset('assets/js/admin-actions.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/layouts/admin.blade.php ENDPATH**/ ?>