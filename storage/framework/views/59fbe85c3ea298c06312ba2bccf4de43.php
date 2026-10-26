

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Cabecera -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos oficiales del club para la liga.</p>
        </div>
        <a href="<?php echo e(route('admin.teams.index')); ?>" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>

    <!-- Formulario en Tarjeta -->
    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="<?php echo e(route('admin.teams.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nombre del Equipo -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="nombre" value="<?php echo e(old('nombre')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Titanes de Abancay">
                </div>

                <!-- Código (Sigla) -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="codigo" value="<?php echo e(old('codigo')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. TIT">
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="categoria" value="<?php echo e(old('categoria')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Mayores / Sub-18">
                </div>

                <!-- Zona / Conferencia -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zona" value="<?php echo e(old('zona')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Centro / Norte">
                </div>

                <!-- Ciudad -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="ciudad" value="<?php echo e(old('ciudad', 'Abancay')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Abancay">
                </div>

                <!-- Entrenador Principal -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="entrenador" value="<?php echo e(old('entrenador')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Nombre del DT">
                </div>

                <!-- Año de Fundación -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="anio_fundacion" value="<?php echo e(old('anio_fundacion')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 2020">
                </div>

                <!-- Ruta / URL del Logo -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ruta / URL del Logo o Bandera</label>
                    <input type="text" name="logo" value="<?php echo e(old('logo')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="URL o ruta de la imagen">
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="<?php echo e(route('admin.teams.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>@extends('layouts.admin')

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Cabecera -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Equipo</h1>
            <p class="text-sm text-gray-400 mt-1">Completa los datos oficiales del club para la liga.</p>
        </div>
        <a href="<?php echo e(route('admin.teams.index')); ?>" class="bg-slate-800 hover:bg-slate-700 text-gray-300 font-medium px-4 py-2 rounded-lg text-sm transition">
            ← Volver al Listado
        </a>
    </div>

    <!-- Formulario en Tarjeta -->
    <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-xl p-6 sm:p-8">
        <form action="<?php echo e(route('admin.teams.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nombre del Equipo -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nombre del Equipo</label>
                    <input type="text" name="nombre" value="<?php echo e(old('nombre')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Titanes de Abancay">
                </div>

                <!-- Código (Sigla) -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Código (Sigla)</label>
                    <input type="text" name="codigo" value="<?php echo e(old('codigo')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. TIT">
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <input type="text" name="categoria" value="<?php echo e(old('categoria')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Mayores / Sub-18">
                </div>

                <!-- Zona / Conferencia -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Zona / Conferencia</label>
                    <input type="text" name="zona" value="<?php echo e(old('zona')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Centro / Norte">
                </div>

                <!-- Ciudad -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ciudad</label>
                    <input type="text" name="ciudad" value="<?php echo e(old('ciudad', 'Abancay')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. Abancay">
                </div>

                <!-- Entrenador Principal -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Entrenador Principal</label>
                    <input type="text" name="entrenador" value="<?php echo e(old('entrenador')); ?>" required
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Nombre del DT">
                </div>

                <!-- Año de Fundación -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Año de Fundación</label>
                    <input type="number" name="anio_fundacion" value="<?php echo e(old('anio_fundacion')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="Ej. 2020">
                </div>

                <!-- Ruta / URL del Logo -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Ruta / URL del Logo o Bandera</label>
                    <input type="text" name="logo" value="<?php echo e(old('logo')); ?>"
                        class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-yellow-500 transition"
                        placeholder="URL o ruta de la imagen">
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-8 flex items-center justify-end space-x-4 border-t border-slate-800 pt-6">
                <a href="<?php echo e(route('admin.teams.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-semibold px-6 py-2.5 rounded-lg shadow-lg transition duration-150">
                    Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/teams/create.blade.php ENDPATH**/ ?>