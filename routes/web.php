<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\CompraController;
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

// Ruta para los libros
Route::resource('libro', LibroController::class)->parameters(['libro' => 'libro']);

// Ruta para los clientes
Route::resource('cliente', ClienteController::class)->parameters(['cliente' => 'cliente']);

// Ruta para las etiquetas
Route::resource('etiqueta', EtiquetaController::class)->parameters(['etiqueta' => 'etiqueta']);

// Ruta para los permisos
Route::resource('permiso', PermisoController::class)->parameters(['permiso' => 'permiso']);

//Ruta para las compras
Route::resource('compra', CompraController::class)->parameters(['compra' => 'compra']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/landing-exitoso-pavlova", function() {
    return view("landing");
});

Route::redirect('/', '/libro', 301);
