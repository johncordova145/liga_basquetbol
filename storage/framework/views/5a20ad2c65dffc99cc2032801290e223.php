

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-white mb-6">Calendario de Partidos</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Columna Izquierda: Listado por Días -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Barra de Categorías -->
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-4">
                <div class="flex space-x-6 text-sm font-semibold">
                    <a href="<?php echo e(route('calendar.public', ['categoria' => 'mayores', 'mes' => request('mes')])); ?>" 
                        class="<?php echo e((request('categoria', 'mayores') == 'mayores') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2'); ?>">
                        Mayores
                    </a>
                    <a href="<?php echo e(route('calendar.public', ['categoria' => 'u19', 'mes' => request('mes')])); ?>" 
                        class="<?php echo e((request('categoria') == 'u19') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2'); ?>">
                        U19
                    </a>
                    <a href="<?php echo e(route('calendar.public', ['categoria' => 'u14', 'mes' => request('mes')])); ?>" 
                        class="<?php echo e((request('categoria') == 'u14') ? 'text-orange-400 border-b-2 border-orange-400 pb-2 -mb-2' : 'text-gray-400 hover:text-white pb-2 -mb-2'); ?>">
                        U14
                    </a>
                </div>
            </div>

            <!-- Navegación de Meses (Opcional si usas $month) -->
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-4 flex justify-between items-center text-white">
                <a href="<?php echo e(route('calendar.public', ['mes' => $prev ?? ''])); ?>" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 rounded text-sm">&larr; Mes Anterior</a>
                <span class="font-bold text-orange-400 capitalize">
                    <?php echo e(isset($month) ? $month->translatedFormat('F Y') : 'Mes Actual'); ?>

                </span>
                <a href="<?php echo e(route('calendar.public', ['mes' => $next ?? ''])); ?>" class="px-3 py-1 bg-gray-800 hover:bg-gray-700 rounded text-sm">Mes Siguiente &rarr;</a>
            </div>

            <!-- Listado de Partidos Agrupados por Día ($days) -->
            <?php if(isset($days)): ?>
                <?php $__empty_1 = true; $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateString => $matchesOnDay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gray-900 border border-gray-800 rounded-lg p-4 text-white shadow">
                        <div class="flex items-center justify-between mb-3 pb-2 border-b border-gray-800">
                            <span class="font-bold text-orange-400 text-sm uppercase">
                                <?php echo e(\Carbon\Carbon::parse($dateString)->translatedFormat('l, d \d\e F \d\e Y')); ?>

                            </span>
                            <span class="text-xs bg-gray-800 px-2 py-0.5 rounded text-gray-300">
                                <?php echo e(count($matchesOnDay)); ?> partidos
                            </span>
                        </div>

                        <div class="space-y-3">
                            <?php $__currentLoopData = $matchesOnDay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bg-gray-950 border border-gray-800/80 rounded-lg p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-center bg-gray-900 px-3 py-2 rounded border border-gray-800">
                                            <span class="block text-xs text-gray-400 font-semibold">HORA</span>
                                            <span class="block text-sm font-bold text-orange-400">
                                                <?php echo e(\Carbon\Carbon::parse($match->played_at)->format('H:i')); ?>

                                            </span>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-white text-base">
                                                <?php echo e($match->homeTeam->name ?? 'Local'); ?> 
                                                <?php if($match->status === 'finished'): ?>
                                                    <span class="mx-2 text-orange-400 font-extrabold"><?php echo e($match->home_score); ?> - <?php echo e($match->away_score); ?></span>
                                                <?php else: ?>
                                                    <span class="text-gray-500 mx-2 text-sm font-normal">vs</span>
                                                <?php endif; ?>
                                                <?php echo e($match->awayTeam->name ?? 'Visita'); ?>

                                            </h3>
                                            <p class="text-xs text-gray-400 mt-1">
                                                Coliseo Cerrado de Abancay • Categoría: <span class="uppercase font-semibold text-gray-300"><?php echo e($match->category); ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-0">
                                        <?php if($match->status === 'finished'): ?>
                                            <span class="text-xs px-2.5 py-1 bg-green-950 border border-green-800 text-green-300 rounded font-semibold">Finalizado</span>
                                        <?php else: ?>
                                            <span class="text-xs px-2.5 py-1 bg-blue-950 border border-blue-800 text-blue-300 rounded font-semibold">Programado</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-gray-900 border border-gray-800 rounded-lg p-6 text-center text-gray-400">
                        No hay partidos programados para este mes. Usa los botones de mes anterior/siguiente para explorar las fechas.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Columna Derecha: Widget Lateral de Noticias -->
        <div class="space-y-6">
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-5 text-white">
                <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-gray-800">
                    <div class="w-8 h-8 rounded-full bg-orange-600 flex items-center justify-center font-bold text-xs">GA</div>
                    <div>
                        <h4 class="font-bold text-sm">Guerreros del Ampay</h4>
                        <p class="text-xs text-gray-400">LIGA OFICIAL</p>
                    </div>
                </div>

                <h3 class="font-bold text-base mb-4">Últimas Noticias</h3>

                <div class="space-y-4">
                    <a href="<?php echo e(route('news.index')); ?>" class="block group">
                        <h5 class="text-xs font-semibold text-gray-200 group-hover:text-orange-400 transition">Titanes de Abancay domina la jornada de básquet mayores en el coliseo local.</h5>
                        <span class="text-[10px] text-gray-500 mt-1 block">Ayer</span>
                    </a>
                    <hr class="border-gray-800">
                    <a href="<?php echo e(route('news.index')); ?>" class="block group">
                        <h5 class="text-xs font-semibold text-gray-200 group-hover:text-orange-400 transition">Leones de Andahuaylas se alistan para el gran clásico regional de vuelta.</h5>
                        <span class="text-[10px] text-gray-500 mt-1 block">Hace 3 días</span>
                    </a>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-800 text-center">
                    <a href="<?php echo e(route('news.index')); ?>" class="block w-full py-2.5 bg-transparent border border-orange-500 text-orange-400 hover:bg-orange-500 hover:text-white transition rounded text-xs font-bold uppercase tracking-wider">
                        Ver todas las noticias
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fiba', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/public/calendar.blade.php ENDPATH**/ ?>