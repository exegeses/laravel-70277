@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de una marca</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/marca/store" method="post">
        @csrf
            <div class="form-group">
                <label for="mkNombre">Nombre de la Marca</label>
                <input type="text" name="mkNombre"
                       value="{{ old( 'mkNombre' ) }}"
                       class="form-control" id="mkNombre">
            </div>

            <button class="btn btn-dark my-3 px-5">Agregar marca</button>
            <a href="/marcas" class="btn btn-outline-secondary sep">
                Volver a panel de marcas
            </a>
        </form>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger p-4 col-8 mx-auto">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>
                        <i class="bi bi-exclamation-triangle"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
