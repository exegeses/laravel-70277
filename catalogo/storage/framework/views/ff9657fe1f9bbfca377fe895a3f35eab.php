<?php $__env->startSection('contenido'); ?>

    <h1>Panel de administración de productos</h1>

    <?php echo $__env->make('layouts.mensaje', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row my-3 text-start">
        <div class="col-11">
            <a href="" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col-1 text-end">
            <a href="/producto/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar
            </a>
        </div>
    </div>

<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row mt-3">
        <figure class="col-3">
            <img src="imgs/<?php echo e($producto->prdImagen); ?>" class="img-thumbnail">
        </figure>
        <div class="col-8">
            <h2><?php echo e($producto->prdNombre); ?></h2>
            <span class="precio3">$<?php echo e($producto->prdPrecio); ?></span>
            <p>
                Marca: <?php echo e($producto->getMarca->mkNombre); ?> <br>
                Categoría: <?php echo e($producto->getCategoria->catNombre); ?> <br>
            </p>
        </div>
        <div class="col-1 d-grid d-md-block">
            <a href="" class="btn btn-outline-secondary me-1">
                <i class="bi bi-pencil-square"></i>
                Modificar
            </a>
            <a href="" class="btn btn-outline-secondary me-1">
                <i class="bi bi-trash"></i>
                &nbsp;Eliminar&nbsp;
            </a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($productos->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/productos.blade.php ENDPATH**/ ?>