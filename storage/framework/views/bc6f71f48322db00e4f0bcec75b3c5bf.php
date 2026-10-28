

<?php $__env->startSection('content'); ?>
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
    <h2 class="text-xl font-bold text-white mb-1">Editar Jugador</h2>
    <p class="text-sm text-gray-400 mb-6">Modifica los datos del deportista.</p>

    <form action="<?php echo e(route('admin.players.update', $player)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <?php if($errors->any()): ?>
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
                <input type="text" name="first_name" value="<?php echo e(old('first_name', $player->first_name)); ?>" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Apellido</label>
                <input type="text" name="last_name" value="<?php echo e(old('last_name', $player->last_name)); ?>" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Equipo</label>
            <select name="team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($team->id); ?>" <?php echo e(old('team_id', $player->team_id) == $team->id ? 'selected' : ''); ?>>
                        <?php echo e($team->name); ?> (<?php echo e(ucfirst($team->category)); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Número de Camiseta (#)</label>
                <input type="number" name="jersey_number" value="<?php echo e(old('jersey_number', $player->jersey_number)); ?>" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Posición</label>
                <select name="position" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    <?php $__currentLoopData = ['Base', 'Escolta', 'Alero', 'Ala-Pívot', 'Pívot']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($pos); ?>" <?php echo e(old('position', $player->position) == $pos ? 'selected' : ''); ?>><?php echo e($pos); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fecha de Nacimiento</label>
                <input type="date" name="birthdate" value="<?php echo e(old('birthdate', $player->birthdate)); ?>" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Estatura (cm)</label>
                <input type="number" name="height_cm" value="<?php echo e(old('height_cm', $player->height_cm)); ?>" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
            <a href="<?php echo e(route('admin.players.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white">
                Cancelar
            </a>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg">
                Actualizar Jugador
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/players/edit.blade.php ENDPATH**/ ?>