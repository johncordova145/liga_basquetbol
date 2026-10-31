<div class="flex items-center space-x-4">
    <?php if(auth()->guard()->check()): ?>

        <span class="text-slate-300 text-sm">Hola, <?php echo e(Auth::user()->name); ?></span>
        
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
            <?php echo csrf_field(); ?>
            <button type="submit" class="text-xs uppercase tracking-wider text-red-400 hover:text-red-300 font-bold transition-colors">
                Cerrar Sesión
            </button>
        </form>
    <?php else: ?>

        <a href="<?php echo e(route('login')); ?>" class="text-xs uppercase tracking-wider text-slate-300 hover:text-white font-bold transition-colors">
            Iniciar Sesión
        </a>
        <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-[#ccff00] hover:bg-[#b3e600] text-slate-950 font-black rounded-full uppercase tracking-wider text-xs transition-all shadow-lg shadow-[#ccff00]/10">
            Registrarse
        </a>
    <?php endif; ?>
</div><?php /**PATH C:\Users\Lupin\OneDrive\Documentos\IngenieriaSoftware\liga-basquetbol\resources\views/layouts/nav.blade.php ENDPATH**/ ?>