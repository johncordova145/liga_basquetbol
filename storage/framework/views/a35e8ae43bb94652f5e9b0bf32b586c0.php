

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Jugador</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos del deportista y asígnalo a su equipo.</p>
        </div>
        <a href="<?php echo e(route('admin.players.index')); ?>" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>

    
    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="<?php echo e(route('admin.players.store')); ?>" method="POST">
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
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre Completo</label>
                    <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Carlos">
                    <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Mendoza">
                </div>

            
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Equipo</label>
                    <select name="team_id" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione un equipo</option>
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($team->id); ?>" <?php echo e(old('team_id') == $team->id ? 'selected' : ''); ?>>
                                <?php echo e($team->name); ?> (<?php echo e(ucfirst($team->category)); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

              
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Número de Camiseta (#)</label>
                    <input type="number" name="jersey_number" value="<?php echo e(old('jersey_number')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 23">
                </div>

               
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Posición</label>
                    <select name="position" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition">
                        <option value="">Seleccione la posición</option>
                        <option value="Base">Base (Point Guard)</option>
                        <option value="Escolta">Escolta (Shooting Guard)</option>
                        <option value="Alero">Alero (Small Forward)</option>
                        <option value="Ala-Pívot">Ala-Pívot (Power Forward)</option>
                        <option value="Pívot">Pívot (Center)</option>
                    </select>
                </div>

           
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Edad</label>
                    <input type="date" name="birth_date" value="<?php echo e(old('birth_date')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 21">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Estatura (m)</label>
                    <input type="number" name="height_cm" value="<?php echo e(old('height_cm')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 1.85m">
                </div>
            </div>

         
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="<?php echo e(route('admin.players.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Jugador
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/players/create.blade.php ENDPATH**/ ?>