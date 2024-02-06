<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

#############################
####  CRUD de Marcas
#############################
use App\Http\Controllers\MarcaController;
//Route::get('peticiòn', [ Controlador::class, 'método']);
Route::get('/marcas', [ MarcaController::class, 'index' ]);
