@extends('layouts.plantilla')
@section('contenido')

    <h1>Baja de una marca</h1>

    <div class="alert alert-danger p-4 col-6 mx-auto shadow ">
        Se eliminará la marca: <span class="fs-4 sep">{{ $marca->mkNombre }}</span>
        <form action="/marca/destroy" method="post">
        @csrf
        @method('delete')
            <input type="hidden" name="idMarca"
                   value="{{ $marca->idMarca }}">
            <input type="hidden" name="mkNombre"
                   value="{{ $marca->mkNombre }}">
            <button class="btn btn-danger my-3 px-4">Confirmar baja</button>
            <a href="/marcas" class="btn btn-outline-secondary sep">
                Volver a panel de marcas
            </a>
        </form>
    </div>

@endsection
