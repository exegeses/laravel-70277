<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*##### crud de marcas #####*/
Route::get('/marcas', [ MarcaController::class, 'index' ])
        ->middleware('auth')->name('marcas');
Route::get('/marca/create', [ MarcaController::class, 'create' ])
        ->middleware('auth');
Route::post('/marca/store', [ MarcaController::class, 'store' ])
        ->middleware('auth');
Route::get('/marca/edit/{marca}', [ MarcaController::class, 'edit' ])
        ->middleware('auth');
Route::put('/marca/update/{marca}', [ MarcaController::class, 'update' ])
        ->middleware('auth');

/*##### crud de productos #####*/
Route::get('/productos', [ ProductoController::class, 'index' ])
        ->middleware('auth')->name('productos');
Route::get('/producto/create', [ ProductoController::class, 'create' ])
        ->middleware('auth');
Route::post('/producto/store', [ ProductoController::class, 'store' ])
        ->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
