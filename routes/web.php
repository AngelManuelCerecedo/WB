<?php

use App\Exports\InventarioExport;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComisionistaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CreditoCompraController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FichaGastosController;
use App\Http\Controllers\FichaIngresoController;
use App\Http\Controllers\FormasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\MetodosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TraspasoController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\VentaController;
use App\Models\Compra;
use App\Models\Empresa;
use App\Models\FichaGasto;
use Maatwebsite\Excel\Facades\Excel;

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

/*Route::get('/', function () {
    return view('auth.login');
});

    Route::get('/dashboard', function () {
        return view('dashboard', ['userid' => auth()->user()]);
    })->name('dashboard');
});*/

Route::get('/', function () {return view('dashboard');})->name('dashboard1');
Route::get('dashboard', function () {return view('dashboard');})->name('dashboard');

//MODULO CATALOGOS
//CLIENTES
Route::get('Clientes', [ClienteController::class, 'cliente'])->name('Clientes');
Route::get('Cliente/Registro', [ClienteController::class, 'rcliente'])->name('RClientes');
Route::get('Cliente/Editar/{id}', [ClienteController::class, 'ecliente'])->name('ECliente');

//COMISIONISTAS
Route::get('Comisionista', [ComisionistaController::class, 'comisionista'])->name('Comisionistas');
Route::get('comisionista/Registro', [ComisionistaController::class, 'rcomisionista'])->name('RComisionistas');
Route::get('comisionista/Editar/{id}', [ComisionistaController::class, 'ecomisionista'])->name('EComisionista');

//EMPRESAS
Route::get('Empresas', [EmpresaController::class, 'empresa'])->name('Empresas');
Route::get('Empresa/Registro', [EmpresaController::class, 'rempresa'])->name('REmpresas');
Route::get('Empresa/Editar/{id}', [EmpresaController::class, 'eempresa'])->name('EEmpresa');

//FORMA DE PAGO
Route::get('FormasPago', [FormasController::class, 'forma'])->name('Formas');
Route::get('FormaPago/Registro', [FormasController::class, 'rforma'])->name('RFormas');
Route::get('FormaPago/Editar/{id}', [FormasController::class, 'eforma'])->name('EForma');

//METODO DE PAGO
Route::get('MetodosPago', [MetodosController::class, 'metodo'])->name('Metodos');
Route::get('MetodoPago/Registro', [MetodosController::class, 'rmetodo'])->name('RMetodos');
Route::get('MetodoPago/Editar/{id}', [MetodosController::class, 'emetodo'])->name('EMetodo');

//EMPLEADOS
Route::get('Empleados', [EmpleadoController::class, 'empleado'])->name('Empleados');
Route::get('Empleados/Registro', [EmpleadoController::class, 'rempleado'])->name('REmpleados');
Route::get('Empleados/Editar/{id}', [EmpleadoController::class, 'eempleado'])->name('EEmpleado');

//MODULO FINANZAS
//FICHA INGRESOS
Route::get('FichasI', [FichaIngresoController::class, 'ficha'])->name('FichasI');
Route::get('FichasI/Registro', [FichaIngresoController::class, 'rficha'])->name('RFichasI');
Route::get('FichasI/Editar/{id}', [FichaIngresoController::class, 'eficha'])->name('EFichaI');

//FICHA GASTOS
Route::get('FichasG', [FichaGastosController::class, 'ficha'])->name('FichasG');
Route::get('FichasG/Registro', [FichaGastosController::class, 'rficha'])->name('RFichasG');
Route::get('FichasG/Editar/{id}', [FichaGastosController::class, 'eficha'])->name('EFichaG');

//ROLES
Route::get('roles', [RoleController::class, 'roles'])->name('Roles');
Route::get('roles/Registro', [RoleController::class, 'rroles'])->name('RRoles');
Route::post('roles/RegistroRol', [RoleController::class, 'store'])->name('GRoles');
Route::get('roles/Editar/{id}', [RoleController::class, 'eroles'])->name('ERoles');
Route::put('roles/Update', [RoleController::class, 'update'])->name('URoles');
