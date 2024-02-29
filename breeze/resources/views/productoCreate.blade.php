<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">


                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="pb-4 text-gray-300">Alta de un Producto</h1>

                    <form action="/producto/store" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="prdNombre" id="prdNombre"
                                   class="block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                                   value="{{ old('prdNombre') }}">
                            <label for="prdNombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del producto</label>
                            @if ($errors->has('prdNombre'))
                                <span class="text-sm text-rose-400">{{ $errors->first('prdNombre') }}</span>
                            @endif
                        </div>

                        <div class="relative z-0 w-full mb-6 mt-2 group">
                            <input type="text" name="prdPrecio" id="prdPrecio"
                                   class="block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                                   value="{{ old('prdPrecio') }}">
                            <label for="prdPrecio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio del producto</label>
                            @if ($errors->has('prdPrecio'))
                                <span class="text-sm text-rose-400">{{ $errors->first('prdPrecio') }}</span>
                            @endif
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <select name="idMarca" id="idMarca" class="block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" ">
                                <option value="">Seleccione una marca</option>
                        @foreach( $marcas as $marca )
                                <option @selected( $marca->idMarca == old('idMarca') ) value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                        @endforeach
                            </select>
                            <label for="idMarca" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marca del producto</label>
                            @if ($errors->has('idMarca'))
                                <span class="text-sm text-rose-400">{{ $errors->first('idMarca') }}</span>
                            @endif
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <select name="idCategoria" id="idCategoria" class="block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" ">
                                <option value="">Seleccione una categoría</option>
                        @foreach( $categorias as $categoria )
                                <option @selected( $categoria->idCategoria == old('idCategoria') ) value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                        @endforeach
                            </select>
                            <label for="idCategoria" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categoría del producto</label>
                            @if ($errors->has('idCategoria'))
                                <span class="text-sm text-rose-400">{{ $errors->first('idCategoria') }}</span>
                            @endif
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <textarea name="prdDescripcion" id="prdDescripcion" rows="2" class="resize-none block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer" placeholder=" "
                                >{{ old('prdDescripcion') }}</textarea>
                            <label for="prdDescripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripción del producto</label>
                            @if ($errors->has('prdDescripcion'))
                                <span class="text-sm text-rose-400">{{ $errors->first('prdDescripcion') }}</span>
                            @endif
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="file" name="prdImagen" id="prdImagen" class="block py-2.5 px-0 w-full text-2xl text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:bg-transparent dark:text-teal-400 dark:border-gray-600 dark:focus:border-teal-500 focus:outline-none focus:ring-0 focus:border-teal-600 peer">
                            <label for="prdImagen" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-teal-600 peer-focus:dark:text-teal-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Imagen del producto (*OPCIONAL)</label>
                            @if ($errors->has('prdImagen'))
                                <span class="text-sm text-rose-400">{{ $errors->first('prdImagen') }}</span>
                            @endif
                        </div>

                        <div class="flex justify-between">
                        <button type="submit" class="text-white bg-teal-800 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-teal-700 dark:hover:bg-teal-600 dark:focus:ring-teal-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="float-left w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Agregar producto
                        </button>

                        <a href="/productos" type="button" class="ml-4 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="float-left w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                            </svg>
                            Volver a panel de productos
                        </a>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>


</x-app-layout>
