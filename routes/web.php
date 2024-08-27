<?php

use App\Exports\InventarioExport;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\BeneficiarioController;
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
use App\Http\Controllers\FacturaController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['userid' => auth()->user()]);
    })->name('dashboard');
});

//MODULO CATALOGOS
//CLIENTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Clientes', [ClienteController::class, 'cliente'])->name('Clientes');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Cliente/Registro', [ClienteController::class, 'rcliente'])->name('RClientes');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Cliente/Editar/{id}', [ClienteController::class, 'ecliente'])->name('ECliente');
});


//BENEFICIARIOS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Beneficiarios', [BeneficiarioController::class, 'beneficiarios'])->name('Beneficiarios');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Beneficiarios/Registro', [BeneficiarioController::class, 'rbeneficiario'])->name('RBeneficiarios');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Beneficiarios/Editar/{id}', [BeneficiarioController::class, 'ebeneficiario'])->name('EBeneficiarios');
});

//COMISIONISTAS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Comisionista', [ComisionistaController::class, 'comisionista'])->name('Comisionistas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('comisionista/Registro', [ComisionistaController::class, 'rcomisionista'])->name('RComisionistas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('comisionista/Editar/{id}', [ComisionistaController::class, 'ecomisionista'])->name('EComisionista');
});

//EMPRESAS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empresas', [EmpresaController::class, 'empresa'])->name('Empresas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empresa/Registro', [EmpresaController::class, 'rempresa'])->name('REmpresas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empresa/Editar/{id}', [EmpresaController::class, 'eempresa'])->name('EEmpresa');
});

//FORMA DE PAGO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FormasPago', [FormasController::class, 'forma'])->name('Formas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FormaPago/Registro', [FormasController::class, 'rforma'])->name('RFormas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FormaPago/Editar/{id}', [FormasController::class, 'eforma'])->name('EForma');
});

//METODO DE PAGO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('MetodosPago', [MetodosController::class, 'metodo'])->name('Metodos');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('MetodoPago/Registro', [MetodosController::class, 'rmetodo'])->name('RMetodos');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('MetodoPago/Editar/{id}', [MetodosController::class, 'emetodo'])->name('EMetodo');
});

//EMPLEADOS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empleados', [EmpleadoController::class, 'empleado'])->name('Empleados');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empleados/Registro', [EmpleadoController::class, 'rempleado'])->name('REmpleados');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Empleados/Editar/{id}', [EmpleadoController::class, 'eempleado'])->name('EEmpleado');
});

//MODULO FINANZAS
//FICHA INGRESOS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasI', [FichaIngresoController::class, 'ficha'])->name('FichasI');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasI/Registro', [FichaIngresoController::class, 'rficha'])->name('RFichasI');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasI/Editar/{id}', [FichaIngresoController::class, 'eficha'])->name('EFichaI');
});

//FICHA GASTOS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasG', [FichaGastosController::class, 'ficha'])->name('FichasG');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasG/Registro', [FichaGastosController::class, 'rficha'])->name('RFichasG');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('FichasG/Editar/{id}', [FichaGastosController::class, 'eficha'])->name('EFichaG');
});

//MODULO FACTURACION
//FACTURAS DEPOSITO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Facturas', [FacturaController::class, 'factura'])->name('Facturas');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Facturas/Registro', [FacturaController::class, 'rfactura'])->name('RFactura');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Facturas/Editar/{id}', [FacturaController::class, 'efactura'])->name('EFactura');
});
//PDF's
Route::get('Formato/pdf/Movimientos/{idEmp}/{id}', [EmpresaController::class, 'PDF'])->name('EstadoCPDF');
//Excel's
//Empresas
Route::get('Formato/xls/Saldos', [EmpresaController::class, 'XLS'])->name('EmpresasXLS');
//Ficha de Depositos
Route::get('Formato/xls/FichaIngreso/{id}', [FichaIngresoController::class, 'XLS'])->name('FichaXLS');
//ROLES
Route::get('roles', [RoleController::class, 'roles'])->name('Roles');
Route::get('roles/Registro', [RoleController::class, 'rroles'])->name('RRoles');
Route::post('roles/RegistroRol', [RoleController::class, 'store'])->name('GRoles');
Route::get('roles/Editar/{id}', [RoleController::class, 'eroles'])->name('ERoles');
Route::put('roles/Update', [RoleController::class, 'update'])->name('URoles');
