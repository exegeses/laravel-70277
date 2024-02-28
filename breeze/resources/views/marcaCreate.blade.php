<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">

                    <h1 class="pb-4 text-gray-300">Alta de una marca</h1>
    <!-- formulario -->
                    <div class="shadow-md rounded-md max-w-3xl mb-72">
                        <form action="/marca/store" method="post">
                            @csrf
                            <div class="p-6">
                                <label for="mkNombre" class="block text-sm font-medium text-gray-400">
                                    Nombre de la marca
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="mkNombre"
                                           value="{{ old('mkNombre') }}"
                                           id="mkNombre" class="py-2 px-3 bg-gray-800 text-green-400 text-2xl focus:ring-green-300 focus:border-green-300 flex-1 block w-full rounded-md border-gray-600">
                                </div>
                                @if ($errors->has('mkNombre'))
                                    <span class="text-sm text-rose-400">{{ $errors->first('mkNombre') }}</span>
                                @endif

                                <div class="py-6 flex items-center justify-end">

                                    <button class="text-green-500 hover:text-green-400
                                        bg-green-950 hover:bg-green-900 px-5 py-1 mr-6
                                        border border-green-500 rounded
                                        ">Agregar marca</button>
                                    <a href="/marcas" class="text-gray-400 hover:text-green-300
                                        bg-gray-900 hover:bg-gray-800 px-5 py-1
                                        border border-gray-500 rounded
                                        ">Volver a panel de marcas</a>

                                </div>

                            </div>
                        </form>
                    </div>
        <!-- FIN formulario -->


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
