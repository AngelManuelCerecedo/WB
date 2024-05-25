<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\Compra;
use Carbon\Carbon;

class Finanzas extends Component
{
    public $ultimasVentas, $totalVentasPorSucursal, $sumaImportes, $sumaCompraPorMes, $sumaVentaPorMes;
    public function render()
    {
        $this->ultimasVentas = Venta::whereNotNull('forma_id')
            ->whereIn('forma_id', [4, 5])
            ->whereNull('Factura')
            ->orderBy('created_at', 'desc')
            ->take(10)
        ->get();
        $this->totalVentasPorSucursal = Venta::select('sucursals.nombre AS nombre_sucursal', DB::raw('ROUND(SUM(ventas.importes), 2) AS total_ventas'))
            ->join('sucursals', 'ventas.sucursal_id', '=', 'sucursals.id')
            ->whereMonth('ventas.fecha', now()->month)
            ->whereYear('ventas.fecha', now()->year)
            ->whereNotNull('ventas.fecha')
            ->groupBy('sucursals.nombre', 'ventas.sucursal_id')
            ->orderBy('sucursals.id')
            ->get();
        $this->sumaImportes = Venta::whereYear('Fecha', Carbon::now()->year)
            ->whereMonth('Fecha', Carbon::now()->month)
            ->sum('Importes');
        $this->sumaCompraPorMes = Compra::whereNull('producto_id')
            ->selectRaw('YEAR(Fecha) as año, MONTH(Fecha) as mes, SUM(ImporteTot) as total')
            ->groupByRaw('YEAR(fecha), MONTH(fecha)')
            ->get();
        $this->sumaVentaPorMes = Venta::selectRaw('YEAR(Fecha) as año, MONTH(Fecha) as mes, SUM(importes) as total')
            ->groupByRaw('YEAR(Fecha), MONTH(Fecha)')
            ->get();
        return view('livewire.dashboard.finanzas');
    }
}
