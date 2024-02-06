@extends('layouts.plantilla')
@section('contenido')

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

@endsection
