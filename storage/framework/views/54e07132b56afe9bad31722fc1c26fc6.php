

<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Editar Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Modifica los datos oficiales del club.</p>
        </div>
        <a href="<?php echo e(route('admin.teams.index')); ?>" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            Volver al Listado
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="<?php echo e(route('admin.teams.update', $team)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
     
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $team->name)); ?>" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

    
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Logo o Escudo del Equipo</label>
                    <input type="file" name="flag" accept="image/*" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-slate-950 hover:file:bg-yellow-400">
                    <?php if($team->flag): ?>
                        <p class="text-xs text-gray-400 mt-2">Imagen actual: <?php echo e($team->flag); ?></p>
                    <?php endif; ?>
                </div>

       
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="code" value="<?php echo e(old('code', $team->code)); ?>" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

      
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="category" value="<?php echo e(old('category', $team->category)); ?>" required 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

        
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zone" value="<?php echo e(old('zone', $team->zone)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

      
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="city" value="<?php echo e(old('city', $team->city)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="coach" value="<?php echo e(old('coach', $team->coach)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>

   
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="founded" value="<?php echo e(old('founded', $team->founded)); ?>" 
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500">
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="<?php echo e(route('admin.teams.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition">
                    Actualizar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/teams/edit.blade.php ENDPATH**/ ?>