

<?php $__env->startSection('content'); ?>
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-white">Listado de Jugadores</h2>
        <a href="<?php echo e(route('admin.players.create')); ?>" class="bg-yellow-500 text-slate-950 font-semibold px-4 py-2 rounded-lg">
            + Nuevo Jugador
        </a>
    </div>

    <table class="w-full text-left text-gray-300">
        <thead class="bg-slate-950 text-xs uppercase text-gray-400">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Equipo</th>
                <th class="p-3">Posición</th>
                <th class="p-3">Dorsal</th>
                <th class="p-3">Nacimiento</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            <?php $__empty_1 = true; $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="p-3"><?php echo e($loop->iteration); ?></td>
                    <td class="p-3 text-white font-medium"><?php echo e($player->first_name); ?> <?php echo e($player->last_name); ?></td>
                    <td class="p-3"><?php echo e($player->team->name ?? 'Sin equipo'); ?></td>
                    <td class="p-3"><?php echo e($player->position); ?></td>
                    <td class="p-3">#<?php echo e($player->jersey_number); ?></td>
                    <td class="p-3"><?php echo e($player->birthdate ?? '-'); ?></td>
                    <td class="p-3 flex space-x-2">
                        <a href="<?php echo e(route('admin.players.edit', $player)); ?>" class="bg-yellow-500 text-slate-950 px-3 py-1 rounded text-sm font-medium">Editar</a>
                        <form action="<?php echo e(route('admin.players.destroy', $player)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este jugador?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm font-medium">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">No hay jugadores registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/players/index.blade.php ENDPATH**/ ?>