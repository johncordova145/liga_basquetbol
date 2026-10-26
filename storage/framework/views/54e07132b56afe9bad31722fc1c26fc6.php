

<?php $__env->startSection('content'); ?>
<div class="admin-container">
    <div class="admin-header">
        <h1>Editar Equipo: <?php echo e($team->nombre); ?></h1>
        <a href="<?php echo e(route('admin.teams.index')); ?>" class="btn btn-secondary">Volver al Listado</a>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.teams.update', $team)); ?>" method="POST" class="admin-form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="nombre">Nombre del Equipo</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo e(old('nombre', $team->nombre)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="codigo">Código (Sigla)</label>
            <input type="text" name="codigo" id="codigo" value="<?php echo e(old('codigo', $team->codigo)); ?>" class="form-control" maxlength="10" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" name="categoria" id="categoria" value="<?php echo e(old('categoria', $team->categoria)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="zona">Zona / Conferencia</label>
            <input type="text" name="zona" id="zona" value="<?php echo e(old('zona', $team->zona)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" value="<?php echo e(old('ciudad', $team->ciudad)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="entrenador">Entrenador Principal</label>
            <input type="text" name="entrenador" id="entrenador" value="<?php echo e(old('entrenador', $team->entrenador)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="anio_fundacion">Año de Fundación</label>
            <input type="number" name="anio_fundacion" id="anio_fundacion" value="<?php echo e(old('anio_fundacion', $team->anio_fundacion)); ?>" class="form-control" min="1900" max="<?php echo e(date('Y')); ?>" required>
        </div>

        <div class="form-group">
            <label for="bandera">Ruta / URL de la Bandera o Logo</label>
            <input type="text" name="bandera" id="bandera" value="<?php echo e(old('bandera', $team->bandera)); ?>" class="form-control">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/admin/teams/edit.blade.php ENDPATH**/ ?>