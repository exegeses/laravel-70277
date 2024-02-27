<?php $__env->startSection('contenido'); ?>

    <h1>Baja de una marca</h1>

    <div class="alert alert-danger p-4 col-6 mx-auto shadow ">
        Se eliminará la marca: <span class="fs-4 sep">Nombre marca</span>
        <form action="" method="post">
            <input type="hidden" name="idMarca"
                   value="idMarca">
            <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
            <a href="/marcas" class="btn btn-outline-secondary sep">
                Volver a panel de marcas
            </a>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/marcaDelete.blade.php ENDPATH**/ ?>