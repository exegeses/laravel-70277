<?php $__env->startSection('contenido'); ?>

    <h1>Alta de un producto</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/producto/store" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group mb-4">
                <label for="prdNombre">Nombre del Producto</label>
                <input type="text" name="prdNombre"
                       value="<?php echo e(old( 'prdNombre' )); ?>"
                       class="form-control" id="prdNombre">
                <?php if( $errors->has('prdNombre') ): ?>
                <span class="text-danger fs-6"><?php echo e($errors->first('prdNombre')); ?></span>
                <?php endif; ?>
            </div>

            <label for="prdPrecio">Precio del Producto</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="number" name="prdPrecio"
                       value="<?php echo e(old('prdPrecio')); ?>"
                       class="form-control" id="prdPrecio" step="0.01">
                <?php if( $errors->has('prdPrecio') ): ?>
                    <span class="text-danger fs-6"><?php echo e($errors->first('prdPrecio')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group mb-4">
                <label for="idMarca">Marca</label>
                <select class="form-select" name="idMarca" id="idMarca">
                    <option value="">Seleccione una marca</option>
            <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if( old('idMarca') == $marca->idMarca ): echo 'selected'; endif; ?> value="<?php echo e($marca->idMarca); ?>"><?php echo e($marca->mkNombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if( $errors->has('idMarca') ): ?>
                    <span class="text-danger fs-6"><?php echo e($errors->first('idMarca')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group mb-4">
                <label for="idCategoria">Categoría</label>
                <select class="form-select" name="idCategoria" id="idCategoria">
                    <option value="">Seleccione una categoría</option>
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if( old('idCategoria') == $categoria->idCategoria ): echo 'selected'; endif; ?> value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->catNombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if( $errors->has('idCategoria') ): ?>
                    <span class="text-danger fs-6"><?php echo e($errors->first('idCategoria')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group mb-4">
                <label for="prdDescripcion">Descripción del Producto</label>
                <textarea name="prdDescripcion" class="form-control"
                          id="prdDescripcion"><?php echo e(old('prdDescripcion')); ?></textarea>
                <?php if( $errors->has('prdDescripcion') ): ?>
                    <span class="text-danger fs-6"><?php echo e($errors->first('prdDescripcion')); ?></span>
                <?php endif; ?>
            </div>

            <div class="mt-1 mb-4">
                <label for="prdImagen" class="form-label">Seleccione un archivo</label>
                <input type="file" name="prdImagen" class="form-control" id="prdImagen">
                <?php if($errors->has('prdImagen')): ?>
                    <span class="mt-0 fs-6 text-danger"><?php echo e($errors->first('prdImagen')); ?></span>
                <?php endif; ?>
            </div>

            <button class="btn btn-dark mr-3 px-4">Agregar producto</button>
            <a href="/productos" class="btn btn-outline-secondary sep">
                Volver a panel de productos
            </a>

        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/marcos/Documents/Cursos/Laravel/laravel-70277/catalogo/resources/views/productoCreate.blade.php ENDPATH**/ ?>