@extends('layouts.plantilla')
    @section('title', 'Laravel app')
    @section('contenido')
    <!-- CDN de sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <h1>Confirmación de baja de un destino</h1>
    <div class="alert alert-danger col-6 mx-auto shadow rounded p-4">
        Se eliminará el destino: <br>
        <span class="fs-4">{{ $destino->aeropuerto }}</span>
        <br>
        {{ $destino->nombre }}.
        <form action="/destino/destroy" method="post">
            @csrf
            <input type="hidden" name="aeropuerto"
                   value="{{ $destino->aeropuerto }}">
            <input type="hidden" name="idDestino"
                   value="{{ $destino->idDestino }}">
            <button class="btn btn-danger btn-block my-3 px-4">
                Confirmar baja
            </button>
            <a href="/destinos" class="btn btn-outline-secondary sep">
                Volver a panel
            </a>
        </form>
    </div>


    <script>
        //lanzamiento de la ventana modal
        Swal.fire(
            {
                title: '¡¡Advertencia!!',
                text: 'Si pulda el botón "Confirmar baja", se eliminará el destino seleccionado',
                icon: 'error'
            }
        )
    </script>
    @endsection
