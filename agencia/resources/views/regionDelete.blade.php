@extends('layouts.plantilla')
@section('contenido')

    <h1>Baja de una región</h1>


    <div class="alert alert-danger p-4 col-8 mx-auto shadow">
        Se eliminará la región
        <span class="fs-4">{{ $region->nombre }}</span>.
        <form action="/region/destroy" method="post">
        @csrf
            <input type="hidden" name="idRegion"
                   value="{{ $region->idRegion }}">
            <input type="hidden" name="nombre"
                   value="{{ $region->nombre }}">
            <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
            <a href="/regiones" class="btn btn-outline-secondary sep">
                volver a panel
            </a>
        </form>

    </div>


@endsection
