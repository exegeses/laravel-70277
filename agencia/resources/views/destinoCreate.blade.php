@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de un destino</h1>

    <div class="alert shadow round col-8 mx-auto p-4">

        <form action="/destino/store" method="post">
        @csrf
            <div class="form-group mb-2">
                <label for="destNombre">Nombre del Destino:</label>
                <input type="text" name="aeropuerto"
                       id="destNombre" class="form-control"
                       required>
            </div>

            <div class="form-group mb-3">
                <label for="idRegion">Región</label>
                <select name="idRegion" id="idRegion"
                        class="form-select" required>
                    <option value="">Seleccione una región</option>
                @foreach( $regiones as $region )
                    <option value="{{ $region->idRegion }}">{{ $region->nombre }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group mb-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="precio"
                           class="form-control" placeholder="Ingrese el precio" required>
                </div>
            </div>


            <button class="btn btn-dark my-3 px-4">Agregar destino</button>
            <a href="/destinos" class="btn btn-outline-secondary sep">
                Volver a panel de destinos
            </a>

        </form>

    </div>


@endsection
