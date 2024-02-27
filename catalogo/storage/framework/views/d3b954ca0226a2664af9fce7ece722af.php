<?php $__env->startSection('contenido'); ?>

    <h1>Panel de administración de marcas</h1>

    <?php if( session('mensaje') ): ?>
        <div class="alert alert-<?php echo e(session('css')); ?>">
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>

    <div class="row my-3 d-flex justify-content-between">
        <div class="col">
            <a href="/dashboard" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col text-end">
            <a href="/marca/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar
            </a>
        </div>
    </div>


    <ul class="list-group">
    <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col">
                <span class="fs-4"><?php echo e($marca->mkNombre); ?></span>
            </div>
            <div class="col text-end btn-group">
                <a href="/marca/edit/<?php echo e($marca->idMarca); ?>" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-pencil-square"></i>
                    Modificar
                </a>
                <a href="/marca/delete/<?php echo e($marca->idMarca); ?>" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-trash"></i>
                    &nbsp;Eliminar&nbsp;
                </a>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="mt-3 d-flex justify-content-end">
        <?php echo e($marcas->links()); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/marcas.blade.php ENDPATH**/ ?>