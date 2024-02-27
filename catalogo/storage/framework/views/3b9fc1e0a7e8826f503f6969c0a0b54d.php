
<?php if( session('mensaje') ): ?>
    <div class="alert alert-<?php echo e(session('css')); ?>">
        <?php echo e(session('mensaje')); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/layouts/mensaje.blade.php ENDPATH**/ ?>