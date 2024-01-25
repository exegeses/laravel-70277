@extends('layouts.plantilla')
@section('title', 'Listado de regiones')
@section('contenido')

    <h1>listado de regiones</h1>

    <ul>
    @foreach( $regiones as $region )
        <li>
            {{ $region->idRegion }}
            {{ $region->nombre }}
        </li>
        @endforeach
    </ul>


@endsection
