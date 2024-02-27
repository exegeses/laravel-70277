<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="container py-4">
    <?php echo $__env->yieldContent('contenido'); ?>

</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/layouts/plantilla.blade.php ENDPATH**/ ?>