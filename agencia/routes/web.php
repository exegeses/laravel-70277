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
    /* $regiones = DB::select('SELECT * FROM regiones'); */
    $regiones = DB::table('regiones')->get();
    //dd( DB::table('regiones')->toSQL() );
    return view('regiones', [ 'regiones'=>$regiones ]);
});
Route::view('/region/create', 'regionCreate');
Route::post('/region/store', function ()
{
    //capturamos dato enviado por el form
    $nombre = request('nombre');
    try {
        //insertamos dato en tabla regiones
        /*DB::insert(
                'INSERT INTO regionesX
                        ( nombre )
                    VALUE
                        ( :nombre )',
                [ $nombre ]
        );*/
        DB::table('regiones')
                    ->insert(
                        [ 'nombre'=>$nombre ]
                    );

        return redirect('/regiones')
                    ->with([
                        'mensaje'=>'Region: '.$nombre.' agregada correctamente',
                        'css'=>'success'
                    ]);
    }
    catch ( Throwable $th ){
        //dd($th->getMessage());
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
    /*$region = DB::select("SELECT *
                            FROM regiones
                            WHERE idRegion = :id",
                            [ $id ]
                        );*/
    $region = DB::table('regiones')
                    ->where('idRegion', $id)
                    ->first();

    return view('regionEdit', [ 'region'=>$region ]);
});
Route::post('/region/update', function ()
{
    //capturamos datos enviados por el form
    $idRegion = request('idRegion');
    $nombre = request('nombre');

    try {
        //modificación de una región
        /** versión raw sql
        * DB::update(
                'UPDATE regiones
                    SET nombre = :nombre
                    WHERE idRegion = :idRegion',
                [ $nombre, $idRegion ]
        );*/
        // versión Query Builder
        DB::table('regiones')
                ->where( 'idRegion', $idRegion )
                ->update( [ 'nombre'=>$nombre ] );

        return redirect('/regiones')
                ->with([
                    'mensaje'=>'Región: '.$nombre.' actualizada corectmente',
                    'css'=>'success'
                ]);
    }catch ( Throwable $th ){
        return redirect('/regiones')
                ->with([
                    'mensaje'=>'No se pudo actualizada la región: '.$nombre.'.',
                    'css'=>'danger'
                ]);
    }
});
Route::get('/region/delete/{id}', function ( $id )
{
    //obtenemos datos de la región
    $region = DB::table('regiones')
                ->where('idRegion', $id)
                ->first();
    ### Checamos si hay destinos relacionados a la región
    $check = DB::table('destinos')
                ->where('idRegion', $id)
                ->count();
    //Si hay destinos de esa región, NO se puede eliminar
    if( $check ){
        return redirect('/regiones')
            ->with(
                [
                    'mensaje'=>'No se puede eliminar la región '.$region->nombre.' porque tiene destinos asociados',
                    'css'=>'warning'
                ]
            );
    }
    return view('regionDelete', [ 'region'=>$region ]);
});
Route::post('/region/destroy', function ()
{
    //capturamos datos enviados por el form
    $idRegion = request('idRegion');
    $nombre = request('nombre');
    try{
        DB::table('regiones')
                ->where('idRegion', $idRegion)
                ->delete();
        return redirect('/regiones')
            ->with([
                'mensaje'=>'Región: '.$nombre.' eliminada corectmente',
                'css'=>'success'
            ]);
    }
    catch ( Throwable $th ){
        // mensaje de error
        return redirect('/regiones')
            ->with([
                'mensaje'=>'No se pudo eliminar la región '.$nombre,
                'css'=>'danger'
            ]);
    }
});
/*############
*  CRUD DE destinos
*############*/
Route::get('/destinos', function ()
{
    //Obenemos listado de destinos
    /*
     * $destinos = "SELECT *, nombre
                        FROM destinos AS d
                        JOIN regiones  AS r
                        ON d.idRegion = r.idRegion";
     * */
    $destinos = DB::table('destinos as d')
                        ->select('*', 'nombre')
                        ->join('regiones AS r', 'd.idRegion', '=', 'r.idRegion')
                        ->get();
    return view('destinos', [ 'destinos'=>$destinos ]);
});
Route::get('/destino/create', function ()
{
    //obtenemos listado de regiones
    $regiones = DB::table('regiones')->get();
    return view('destinoCreate', [ 'regiones'=>$regiones ]);
});
Route::post('/destino/store', function ()
{
    $aeropuerto  = request('aeropuerto');
    $idRegion = request('idRegion');
    $precio = request('precio');
    try{
        DB::table('destinos')
                ->insert(
                    [
                        'aeropuerto'=>$aeropuerto,
                        'idRegion'=>$idRegion,
                        'precio'=>$precio,
                        'activo'=>1
                    ]
                );
        return redirect('/destinos')
                ->with([
                    'mensaje'=>'Destino: '.$aeropuerto.' agregado correctemente',
                    'css'=>'success'
                ]);
    }
    catch ( Throwable $th ){
        return redirect('/destinos')
            ->with([
                'mensaje'=>'No se pudo agregar el destino'.$aeropuerto,
                'css'=>'danger'
            ]);
    }
});
Route::get('/destino/edit/{id}', function ($id)
{
    //obtenemos datos de un destino por su id
    $destino = DB::table('destinos')
                    ->where('idDestino', $id)
                    ->first();
    //obtenemos listado de regiones
    $regiones = DB::table('regiones')->get();
    return view('destinoEdit',
                    [
                        'destino'=>$destino,
                        'regiones'=>$regiones
                    ]
    );
});

Route::post('/destino/update', function ()
{
    $aeropuerto = request('aeropuerto');
    $idRegion = request('idRegion');
    $precio = request('precio');
    $idDestino = request('idDestino');
    try {
        DB::table('destinos')
                ->where('idDestino', $idDestino)
                ->update(
                    [
                        'aeropuerto'=>$aeropuerto,
                        'idRegion'=>$idRegion,
                        'precio'=>$precio
                    ]
                );
        return redirect('/destinos')
            ->with([
                'mensaje'=>'Destino: '.$aeropuerto.' modificado correctemente',
                'css'=>'success'
            ]);
    }
    catch ( Throwable $th ){
        return redirect('/destinos')
            ->with([
                'mensaje'=>'No se pudo modificar el destino'.$aeropuerto,
                'css'=>'danger'
            ]);
    }
});

Route::get('/destino/delete/{id}', function ($id)
{
    //obtenemos datos de un destino por su id
    $destino = DB::table('destinos as d')
                ->join( 'regiones as r', 'd.idRegion', '=', 'r.idRegion' )
                ->where('idDestino', $id)
                ->first();
    return view('destinoDelete', [ 'destino'=>$destino ]);
});
Route::post('/destino/destroy', function ()
{
    $aeropuerto = request('aeropuerto');
    $idDestino = request('idDestino');
    try{
        DB::table('destinos')
            ->where('idDestino', $idDestino)
            ->delete();
        return redirect('/destinos')
            ->with([
                'mensaje'=>'Destino: '.$aeropuerto.' eliminado correctemente',
                'css'=>'success'
            ]);
    }
    catch ( Throwable $th ){
        return redirect('/destinos')
            ->with([
                'mensaje'=>'No se pudo eliminar el destino'.$aeropuerto,
                'css'=>'danger'
            ]);
    }
});
