<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FormasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\MetodosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TraspasoController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\VentaController;
use App\Models\Empleado;
use App\Models\Sucursal;


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

//MODULO CATALOGOS
//PROVEEDORES
Route::get('Proveedores', [ProveedorController::class, 'proveedor'])->name('Proveedores');
Route::get('Proveedore/Registro', [ProveedorController::class, 'rproveedor'])->name('RProveedores');
Route::get('Proveedore/Editar/{id}', [ProveedorController::class, 'eproveedor'])->name('EProveedor');

//CLIENTES
Route::get('Clientes', [ClienteController::class, 'cliente'])->name('Clientes');
Route::get('Cliente/Registro', [ClienteController::class, 'rcliente'])->name('RClientes');
Route::get('Cliente/Editar/{id}', [ClienteController::class, 'ecliente'])->name('ECliente');

//CATEGORIAS
Route::get('Categorias', [CategoriasController::class, 'categoria'])->name('Categorias');
Route::get('Categoria/Registro', [CategoriasController::class, 'rcategoria'])->name('RCategorias');
Route::get('Categoria/Editar/{id}', [CategoriasController::class, 'ecategoria'])->name('ECategoria');

//MARCAS
Route::get('Marcas', [MarcasController::class, 'marca'])->name('Marcas');
Route::get('Marca/Registro', [MarcasController::class, 'rmarca'])->name('RMarcas');
Route::get('Marca/Editar/{id}', [MarcasController::class, 'emarca'])->name('EMarca');

//UNIDADES DE MEDIDA
Route::get('UnidadesMedidas', [UnidadesController::class, 'unidad'])->name('Unidades');
Route::get('UnidadMedida/Registro', [UnidadesController::class, 'runidad'])->name('RUnidades');
Route::get('UnidadMedida/Editar/{id}', [UnidadesController::class, 'eunidad'])->name('EUnidad');

//FORMA DE PAGO
Route::get('FormasPago', [FormasController::class, 'forma'])->name('Formas');
Route::get('FormaPago/Registro', [FormasController::class, 'rforma'])->name('RFormas');
Route::get('FormaPago/Editar/{id}', [FormasController::class, 'eforma'])->name('EForma');

//METODO DE PAGO
Route::get('MetodosPago', [MetodosController::class, 'metodo'])->name('Metodos');
Route::get('MetodoPago/Registro', [MetodosController::class, 'rmetodo'])->name('RMetodos');
Route::get('MetodoPago/Editar/{id}', [MetodosController::class, 'emetodo'])->name('EMetodo');

//MODULO ADMINISTRACION
//EMPLEADOS
Route::get('Empleados', [EmpleadoController::class, 'empleado'])->name('Empleados');
Route::get('Empleados/Registro', [EmpleadoController::class, 'rempleado'])->name('REmpleados');
Route::get('Empleados/Editar/{id}', [EmpleadoController::class, 'eempleado'])->name('EEmpleado');

//SUCURSALES
Route::get('Sucursales', [SucursalController::class, 'sucursal'])->name('Sucursales');
Route::get('Sucursales/Registro', [SucursalController::class, 'rsucursal'])->name('RSucursales');
Route::get('Sucursales/Editar/{id}', [SucursalController::class, 'esucursal'])->name('ESucursal');

//MODULO ALMACEN
//PRODUCTOS
Route::get('Productos', [ProductoController::class, 'producto'])->name('Productos');
Route::get('Productos/Registro', [ProductoController::class, 'rproducto'])->name('RProductos');
Route::get('Productos/Editar/{id}', [ProductoController::class, 'eproducto'])->name('EProducto');

//ALMACENES
Route::get('Almacenes', [AlmacenController::class, 'almacen'])->name('Almacenes');
Route::get('Almacen/Existencias/{id}', [AlmacenController::class, 'ralmacen'])->name('RAlmacen');
Route::get('Almacen/Lista/{id}', [AlmacenController::class, 'ealmacen'])->name('EAlmacen');

//TRASPASOS
Route::get('Traspasos', [TraspasoController::class, 'traspaso'])->name('Traspasos');
Route::get('Traspaso/Registro', [TraspasoController::class, 'rtraspaso'])->name('RTraspaso');
Route::get('Traspaso/Editar/{id}', [TraspasoController::class, 'etraspaso'])->name('ETraspaso');

//MODULO OPREACION
//COMPRAS
Route::get('Compras', [CompraController::class, 'compra'])->name('Compras');
Route::get('Compras/Registro', [CompraController::class, 'rcompra'])->name('RCompra');
Route::get('Compras/Editar/{id}', [CompraController::class, 'ecompra'])->name('ECompra');

//COTIZACIONES
Route::get('Cotizaciones', [CotizacionController::class, 'cotizacion'])->name('Cotizaciones');
Route::get('Cotizaciones/Registro', [CotizacionController::class, 'rcotizacion'])->name('RCotizacion');
Route::get('Cotizaciones/Editar/{id}', [CotizacionController::class, 'ecotizacion'])->name('ECotizacion');

//VENTAS
Route::get('Ventas', [VentaController::class, 'venta'])->name('Ventas');
Route::get('Ventas/Registro', [VentaController::class, 'rventa'])->name('RVenta');
Route::get('Ventas/Editar/{id}', [VentaController::class, 'eventa'])->name('EVenta');
Route::get('Ventas/PuntoVenta', [VentaController::class, 'pventa'])->name('PuntoVenta');
Route::get('Ventas/PuntoVenta/RCliente', [VentaController::class, 'pventarcliente'])->name('PuntoVentaRcliente');
Route::get('Ventas/PuntoVenta/RCotizacion', [VentaController::class, 'pventarcotizacion'])->name('PuntoVentaRCotizacion');
Route::get('Ventas/PuntoVenta/Cotizaciones/Editar/{id}', [VentaController::class, 'pventaecotizacion'])->name('PECotizacion');
Route::get('Ventas/PuntoVenta/Ventas/Editar/{id}', [VentaController::class, 'pventaeventa'])->name('PEVenta');

//ROLES
Route::get('roles', [RoleController::class, 'roles'])->name('Roles');
Route::get('roles/Registro', [RoleController::class, 'rroles'])->name('RRoles');
Route::post('roles/RegistroRol', [RoleController::class, 'store'])->name('GRoles');
Route::get('roles/Editar/{id}', [RoleController::class, 'eroles'])->name('ERoles');
Route::put('roles/Update', [RoleController::class, 'update'])->name('URoles');
