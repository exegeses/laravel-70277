<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            <!-- inicio contenido -->
                <!-- flash -->
                @include('layouts.mensajes')

                    <div class="shadow-md sm:rounded-lg">
                                <table class="w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-gray-700 dark:text-gray-400">

                                        </th>
                                        <th scope="row" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Producto
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Marca
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Categoría
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Precio
                                        </th>
                                        <th  class="p-4">
                                            <a href="/producto/create" class="text-gray-700 dark:text-gray-400 hover:underline flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Agregar
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach( $productos as $producto )
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 text-gray-700 dark:text-gray-400">
                                            <img src="/imgs/{{ $producto->prdImagen }}">
                                        </td>
                                        <th scope="row" class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $producto->prdNombre }}
                                        </th>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-500  dark:text-white">
                                            {{ $producto->getMarca->mkNombre }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900  dark:text-white">
                                            {{ $producto->getCate->catNombre }}
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900  dark:text-white">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                                ${{ $producto->prdPrecio }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-sm font-medium text-right ">
                                            <a href="/producto/edit/{{ $producto->idProducto }}" class="text-gray-700 dark:text-gray-400 hover:underline py-3 flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 align-middle">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    Modificar
                                            </a>
                                            <a href="" class="text-gray-700 dark:text-gray-400 hover:underline py-3 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 align-middle">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                    @endforeach
                                </table>
                        </div>

            </div>
        </div>
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8 py-4">
            {{ $productos->links() }}
        </div>

        <!-- fin contenido -->
    </div>
</x-app-layout>
