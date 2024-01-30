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

/* ###################
    crud de regiones
*/
Route::get('/regiones', function ()
{
    //obtenemos listado de regiones
    $regiones = DB::select('SELECT * FROM regiones');
    return view('regiones', [ 'regiones'=>$regiones ]);
});
Route::view('/region/create', 'regionCreate');
Route::post('/region/store', function ()
{
    //capturamos dato enviado por el form
    $nombre = request('nombre');
    try {
        //insertamos dato en tabla regiones
        DB::insert(
                'INSERT INTO regionesX
                        ( nombre )
                    VALUE
                        ( :nombre )',
                [ $nombre ]
        );
        return redirect('/regiones')
                    ->with([
                        'mensaje'=>'Region: '.$nombre.' agregada correctamente',
                        'css'=>'success'
                    ]);
    }
    catch ( Throwable $th ){
        dd($th->getMessage());
        // mensaje de error
        return redirect('/regiones')
                    ->with([
                        'mensaje'=>'No se pudo agregar la región '.$nombre,
                        'css'=>'danger'
                    ]);
    }

});
Route::get('/region/edit/{id}', function ($id)
{
    //obtenemos datos de una region filtrada por su id
    $region = DB::select("SELECT *
                            FROM regiones
                            WHERE idRegion = :id",
                            [ $id ]
                        );
    return view('regionEdit', [ 'region'=>$region ]);
});
Route::post('/region/update', function ()
{
    
    //modificación de una región
});
