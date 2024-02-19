@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de un producto</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/producto/store" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-4">
                <label for="prdNombre">Nombre del Producto</label>
                <input type="text" name="prdNombre"
                       value="{{ old( 'prdNombre' ) }}"
                       class="form-control" id="prdNombre">
                @if( $errors->has('prdNombre') )
                <span class="text-danger fs-6">{{ $errors->first('prdNombre') }}</span>
                @endif
            </div>

            <label for="prdPrecio">Precio del Producto</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="number" name="prdPrecio"
                       value="{{ old('prdPrecio') }}"
                       class="form-control" id="prdPrecio" min="0" step="0.01">
                @if( $errors->has('prdPrecio') )
                    <span class="text-danger fs-6">{{ $errors->first('prdPrecio') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="idMarca">Marca</label>
                <select class="form-select" name="idMarca" id="idMarca">
                    <option value="">Seleccione una marca</option>
            @foreach( $marcas as $marca )
                    <option @selected( old('idMarca') == $marca->idMarca ) value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
            @endforeach
                </select>
                @if( $errors->has('idMarca') )
                    <span class="text-danger fs-6">{{ $errors->first('idMarca') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="idCategoria">Categoría</label>
                <select class="form-select" name="idCategoria" id="idCategoria">
                    <option value="">Seleccione una categoría</option>
            @foreach( $categorias as $categoria )
                    <option @selected( old('idCategoria') == $categoria->idCategoria ) value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
            @endforeach
                </select>
                @if( $errors->has('idCategoria') )
                    <span class="text-danger fs-6">{{ $errors->first('idCategoria') }}</span>
                @endif
            </div>

            <div class="form-group mb-4">
                <label for="prdDescripcion">Descripción del Producto</label>
                <textarea name="prdDescripcion" class="form-control"
                          id="prdDescripcion">{{ old('prdDescripcion') }}</textarea>
                @if( $errors->has('prdDescripcion') )
                    <span class="text-danger fs-6">{{ $errors->first('prdDescripcion') }}</span>
                @endif
            </div>

            <div class="mt-1 mb-4">
                <label for="prdImagen" class="form-label">Seleccione un archivo</label>
                <input type="file" name="prdImagen" class="form-control" id="prdImagen">
                @if ($errors->has('prdImagen'))
                    <span class="mt-0 fs-6 text-danger">{{ $errors->first('prdImagen') }}</span>
                @endif
            </div>

            <button class="btn btn-dark mr-3 px-4">Agregar producto</button>
            <a href="/productos" class="btn btn-outline-secondary sep">
                Volver a panel de productos
            </a>

        </form>
    </div>

@endsection
