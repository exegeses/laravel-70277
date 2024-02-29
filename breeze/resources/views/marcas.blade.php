<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel de administración de marcas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- inicio contenido -->

                @include('layouts.mensajes')

                <table class="w-2/3 mx-auto">
                    <thead>
                    <tr>
                        <th class="py-1 px-3 text-left w1/6">id</th>
                        <th class="py-1 px-3 text-left w4/6">Marca</th>
                        <th  class="py-1 px-3 text-right w1/6">
                            <a href="/marca/create"
                               class="inline-flex items-center px-1 py-1 px-3 border-2 rounded-md border-green-400 dark:border-green-600 text-sm font-medium leading-5 text-gray-900 dark:text-green-400 hover:bg-green-900 focus:outline-none focus:border-green-700 transition duration-150 ease-in-out"
                                        >agregar</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
@foreach( $marcas as $marca )
                        <tr class="hover:bg-gray-950 odd:bg-gray-700">
                            <td class="py-2 px-3">{{ $marca->idMarca }}</td>
                            <td class="py-2 px-3 text-xl">{{ $marca->mkNombre }}</td>
                            <td class="text-right py-2 px-3">
                                <a
                                    class="inline-flex items-center px-1 py-1 px-3 border-2 rounded-md border-green-400 dark:border-green-600 text-sm font-medium leading-5 text-gray-900 dark:text-green-400 hover:bg-green-900 focus:outline-none focus:border-green-700 transition duration-150 ease-in-out"
                                    href="{{ url('/marca/edit/'.$marca->idMarca) }}">Modificar</a>
                                <x-botones href="/marca/delete/id">Eliminar</x-botones>
                            </td>
                        </tr>
@endforeach
                    </tbody>
                </table>

                <div class="max-w-lg mx-auto sm:px-6 lg:px-8 py-4">
                    {{ $marcas->links() }}
                </div>
            <!-- fin contenido -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
