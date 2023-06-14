<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/Home', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('Proveedores',[ProveedorController::class,'proveedor'])->name('Proveedores');
Route::get('Proveedores/Registro',[ProveedorController::class,'rproveedor'])->name('RProveedores');



