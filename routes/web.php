<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;

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

//PROVEEDORES
Route::get('Proveedores',[ProveedorController::class,'proveedor'])->name('Proveedores');
Route::get('Proveedore/Registro',[ProveedorController::class,'rproveedor'])->name('RProveedores');
Route::get('Proveedore/Editar/{id}',[ProveedorController::class,'eproveedor'])->name('EProveedor');

//CLIENTES
Route::get('Clientes',[ClienteController::class,'cliente'])->name('Clientes');
Route::get('Cliente/Registro',[ClienteController::class,'rcliente'])->name('RClientes');
Route::get('Cliente/Editar/{id}',[ClienteController::class,'ecliente'])->name('ECliente');


