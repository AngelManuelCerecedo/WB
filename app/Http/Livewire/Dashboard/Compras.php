<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Compras extends Component
{
    public $Compras, $datosGastoPorMes, $datosGastoPorCategoria, $informacionComprasPorProveedor, $productosMasComprados;
    public function render()
    {
        $this->Compras = Compra::Where('producto_id', null)->latest()->take(10)->get();
        $this->datosGastoPorMes = Compra::select(
            DB::raw('MONTH(Fecha) as mes'),
            DB::raw('YEAR(Fecha) as año'),
            DB::raw('SUM(CASE WHEN tipoC = "Credito" THEN ImporteTot ELSE 0 END) as total_credito'),
            DB::raw('SUM(CASE WHEN tipoC = "Contado" THEN ImporteTot ELSE 0 END) as total_contado')
        )
            ->groupBy('mes', 'año')
            ->get();
        $this->datosGastoPorCategoria = Producto::join('compras', 'compras.producto_id', '=', 'productos.id')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('categorias.nombre as nombre_categoria', DB::raw('SUM(compras.cantidad * compras.precioC) as total'))
            ->groupBy('categorias.nombre')
            ->get();
        $this->informacionComprasPorProveedor = Compra::join('proveedors', 'compras.proveedor_id', '=', 'proveedors.id')
            ->select('proveedors.nombre as nombre_proveedor', DB::raw('COUNT(*) as numero_compras'), DB::raw('SUM(ImporteTot) as monto_total'))
            ->whereNull('compras.producto_id')
            ->groupBy('proveedors.nombre')
            ->get();
        $this->productosMasComprados = Compra::select('productos.nombre as nombre_producto', DB::raw('SUM(compras.cantidad) as total_comprado'))
            ->join('productos', 'compras.producto_id', '=', 'productos.id')
            ->groupBy('productos.nombre')
            ->orderByDesc('total_comprado')
            ->take(10)
            ->get();

        return view('livewire.dashboard.compras');
    }
}
