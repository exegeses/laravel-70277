<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
//Route::view('petición', 'vista');
Route::view('/', 'welcome');

Route::view('/uva', 'inicio');

//closure
//Route::get('/peticion', acción);
Route::get('/datos', function()
{
    //declarar variables
    $nombre = 'marcos';
    $marcas = ['asus', 'inka cola', 'nike', 'adidas', 'puma'];
    // retornamos una vista y la ENVIAMOS las variables (retornarlas)
    // return view( 'nombreVista', [] );
    return view('datos',
                [
                    'nombre'=>$nombre,
                    'marcas'=>$marcas
                ]
            );
});
/* formulario + proceso */
Route::view('/formulario', 'formulario');
Route::post('/proceso', function ()
{
    //camturamos dato enviado por el form
    // $nombre = $_POST['nombre'];
    // $nombre = request()->post('nombre');
    // $nombre = request()->input('nombre');
    // $nombre = request()->nombre;
    $nombre = request('nombre');

    return view('proceso', [ 'nombre'=>$nombre ]);
});

Route::view('/inicio', 'inicio');
Route::get('/lista-regiones', function()
{
    //obtenemos listado de regiones
    $regiones = DB::select('SELECT * FROM regiones');
    //retornamos vista + pasar datos
    return view('lista-regiones', [ 'regiones'=>$regiones ]);
});
