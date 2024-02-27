# Named Routes (rutas con nombre)

> Podemos utilizar el método name() para bautizar una petición


> Cuándo creamos una ruta utilizamos:

    Route::get('/peticion', accion);

> Para crear una ruta con hombre utilizamos:

    Route::get('/peticion', accion)->name('nombre');

> En un enlace lo usamos de esta manera: 


    <a href="{{ route('nombre') }}">Ir a x</a>