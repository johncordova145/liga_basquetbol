

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-white mb-6">Clasificación de la Liga</h1>


    <div class="flex space-x-4 mb-6">
        <?php $__currentLoopData = $panels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $panel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('ranking.public', ['categoria' => $key])); ?>" 
               class="px-4 py-2 rounded <?php echo e($active === $key ? 'bg-orange-500 text-white font-bold' : 'bg-gray-800 text-gray-300'); ?>">
                <?php echo e($panel['label']); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <?php if(isset($panels[$active])): ?>
        <div class="bg-gray-900 rounded-lg p-6 shadow-md border border-gray-800 text-white">
            <h2 class="text-2xl font-semibold mb-4"><?php echo e($panels[$active]['label']); ?> - Tabla General</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-800 text-gray-400">
                            <th class="py-2 px-3">Equipo</th>
                            <th class="py-2 px-3">PJ</th>
                            <th class="py-2 px-3">PG</th>
                            <th class="py-2 px-3">PP</th>
                            <th class="py-2 px-3">PF</th>
                            <th class="py-2 px-3">PC</th>
                            <th class="py-2 px-3">DIF</th>
                            <th class="py-2 px-3">Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $panels[$active]['overall']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-800/50 hover:bg-gray-800/30">
                                <td class="py-3 px-3 font-semibold"><?php echo e($team->name ?? $team->equipo ?? 'Equipo'); ?></td>
                                <td class="py-3 px-3"><?php echo e($team->jugados ?? $team->pj ?? 0); ?></td>
                                <td class="py-3 px-3"><?php echo e($team->ganados ?? $team->pg ?? 0); ?></td>
                                <td class="py-3 px-3"><?php echo e($team->perdidos ?? $team->pp ?? 0); ?></td>
                                <td class="py-3 px-3"><?php echo e($team->pf ?? 0); ?></td>
                                <td class="py-3 px-3"><?php echo e($team->pc ?? 0); ?></td>
                                <td class="py-3 px-3"><?php echo e(($team->pf ?? 0) - ($team->pc ?? 0)); ?></td>
                                <td class="py-3 px-3 font-bold text-orange-400"><?php echo e($team->puntos ?? 0); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fiba', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/public/ranking.blade.php ENDPATH**/ ?>