<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\Venta_Producto;
use Carbon\Carbon;

class Gerencia extends Component
{
    public $ultimasVentas, $Masvendidos,$Menosvendidos,$sumaImportes, $sumaCompraPorMes, $sumaVentaPorMes;
    public $sumaImportesECA,$sumaImportesOC,$sumaImportesFA,$sumaImportesECOM,$sumaImportesGOB;
    public function render()
    {
        $inicioDeSemana = Carbon::now()->startOfWeek();
        $finDeSemana = Carbon::now()->endOfWeek();
        $this->Masvendidos = Venta_Producto::select('productos.nombre as nombre_producto', Venta_Producto::raw('SUM(venta__productos.cantidad) as cantidad_total'))
            ->join('productos', 'productos.id', '=', 'venta__productos.producto_id') // Unir las tablas por el ID del producto
            ->whereBetween('venta__productos.created_at', [$inicioDeSemana, $finDeSemana])
            ->groupBy('nombre_producto') // Agrupar por nombre de producto
            ->orderBy('cantidad_total', 'desc') // Ordenar por la cantidad total
            ->limit(20) // Limitar al top 20
            ->get();
        $this->Menosvendidos = Venta_Producto::select('productos.nombre as nombre_producto', Venta_Producto::raw('SUM(venta__productos.cantidad) as cantidad_total'))
            ->join('productos', 'productos.id', '=', 'venta__productos.producto_id') // Unir las tablas por el ID del producto
            ->whereBetween('venta__productos.created_at', [$inicioDeSemana, $finDeSemana]) // Filtrar por la semana actual
            ->groupBy('nombre_producto') // Agrupar por nombre de producto
            ->orderBy('cantidad_total', 'asc') // Ordenar por cantidad total, de menor a mayor
            ->limit(20) // Limitar a los primeros 20 menos vendidos
            ->get();
        $this->ultimasVentas = Venta::whereNotNull('forma_id')
            ->whereIn('forma_id', [4, 5])
            ->whereNull('Factura')
            ->orderBy('created_at', 'desc')
            ->take(10)
        ->get();
        //VENTAS TOTALES POR MES
        $this->sumaImportes = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual  
            ->sum('Importes');
        $this->sumaImportesECA = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual
            ->whereIn('sucursal_id', [1])
            ->sum('Importes'); 
        $this->sumaImportesOC = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual
            ->whereIn('sucursal_id', [2])
            ->sum('Importes'); 
        $this->sumaImportesFA = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual
            ->whereIn('sucursal_id', [3])
            ->sum('Importes'); 
        $this->sumaImportesECOM = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual
            ->whereIn('sucursal_id', [5])
            ->sum('Importes'); 
        $this->sumaImportesGOB = Venta::whereYear('Fecha', Carbon::now()->year)  // Año actual
            ->whereMonth('Fecha', Carbon::now()->month)  // Mes actual
            ->whereIn('sucursal_id', [6])
            ->sum('Importes'); 
            
        $this->sumaCompraPorMes = Compra::whereNull('producto_id')
            ->selectRaw('YEAR(Fecha) as año, MONTH(Fecha) as mes, SUM(ImporteTot) as total')
            ->groupByRaw('YEAR(fecha), MONTH(fecha)')
            ->get();
        $this->sumaVentaPorMes = Venta::selectRaw('YEAR(Fecha) as año, MONTH(Fecha) as mes, SUM(importes) as total')
            ->groupByRaw('YEAR(Fecha), MONTH(Fecha)')
            ->get();
        return view('livewire.dashboard.gerencia');
    }
}
