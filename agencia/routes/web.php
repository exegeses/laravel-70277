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
    return view('datos',
                [
                    'nombre'=>$nombre,
                    'marcas'=>$marcas
                ]
            );
});
