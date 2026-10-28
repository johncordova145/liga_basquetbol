

<?php $__env->startSection('content'); ?>
<div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
    <h2 class="text-xl font-bold text-white mb-1">Registrar Nuevo Partido</h2>
    <p class="text-sm text-gray-400 mb-6">Configura el encuentro, fecha y fase del torneo.</p>

    <form action="<?php echo e(route('admin.matches.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

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
                <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Local</label>
                <select name="home_team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    <option value="">Seleccione equipo local</option>
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($team->id); ?>" <?php echo e(old('home_team_id') == $team->id ? 'selected' : ''); ?>>
                            <?php echo e($team->name); ?> (<?php echo e(ucfirst($team->category)); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

       
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Equipo Visitante</label>
                <select name="away_team_id" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    <option value="">Seleccione equipo visitante</option>
                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($team->id); ?>" <?php echo e(old('away_team_id') == $team->id ? 'selected' : ''); ?>>
                            <?php echo e($team->name); ?> (<?php echo e(ucfirst($team->category)); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
      
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fecha y Hora del Partido (`played_at`)</label>
                <input type="datetime-local" name="played_at" value="<?php echo e(old('played_at')); ?>" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>

      
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Fase / Jornada (`stage`)</label>
                <input type="text" name="stage" value="<?php echo e(old('stage')); ?>" placeholder="Ej. Fase de Grupos - Masculino" required 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-6">
      
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Sede / Coliseo (`venue`)</label>
                <input type="text" name="venue" value="<?php echo e(old('venue')); ?>" placeholder="Ej. Coliseo Principal" 
                    class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
            </div>

            
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Estado (`status`)</label>
                <select name="status" required class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white">
                    <option value="scheduled" <?php echo e(old('status') == 'scheduled' ? 'selected' : ''); ?>>Programado</option>
                    <option value="finished" <?php echo e(old('status') == 'finished' ? 'selected' : ''); ?>>Finalizado</option>
                </select>
            </div>


            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-2">Canastas Local</label>
                    <input type="number" name="home_score" value="<?php echo e(old('home_score', 0)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2.5 text-white">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-2">Canastas Visit.</label>
                    <input type="number" name="away_score" value="<?php echo e(old('away_score', 0)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2.5 text-white">
                </div>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
            <a href="<?php echo e(route('admin.matches.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white">
                Cancelar
            </a>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg">
                Guardar Partido
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/matches/create.blade.php ENDPATH**/ ?>