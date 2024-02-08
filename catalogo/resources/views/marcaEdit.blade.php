@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificación de una marca</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/marca/update" method="post">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="mkNombre">Nombre de la Marca</label>
                <input type="text" name="mkNombre"
                       value="{{ old('mkNombre', $marca->mkNombre) }}"
                       class="form-control" id="mkNombre" required>
            </div>
            <input type="hidden" name="idMarca"
                   value="{{ $marca->idMarca }}">

            <button class="btn btn-dark my-3 px-5">Agregar marca</button>
            <a href="/marcas" class="btn btn-outline-secondary sep">
                Volver a panel de marcas
            </a>
        </form>
    </div>

@endsection
