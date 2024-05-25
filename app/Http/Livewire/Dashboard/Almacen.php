<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Compra;
use App\Models\Lote;
use App\Models\Producto;
use App\Models\Traspaso;
use App\Models\Venta_Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Almacen extends Component
{
    public $Traspasos, $Productos, $producto, $ProductosSUC , $productosuc,$cantidadPorSucursal;
    public $cC=0, $cV=0, $cL=0, $search;
    public function render()
    {
        $this->Traspasos = Traspaso::Where('producto_id', null)->latest()->take(10)->get();
        $this->Productos = Producto::all();
        if ($this->producto) {
            $this->cC = Compra::where('producto_id', $this->producto)->sum('cantidad');
            $this->cL = Lote::where('producto_id', $this->producto)->sum('cantidad');
            $this->cV = Venta_Producto::where('producto_id', $this->producto)->sum('cantidad');
        }
        $this->emit('actualizarGrafico', ['cC' => $this->cC, 'cL' => $this->cL, 'cV' => $this->cV]);
        $this->ProductosSUC = Producto::all();
        if ($this->productosuc) {
            $this->cantidadPorSucursal = Venta_Producto::select('ventas.sucursal_id', DB::raw('SUM(venta__productos.cantidad) as cantidad_vendida'))
                ->join('ventas', 'venta__productos.venta_id', '=', 'ventas.id')
                ->where('venta__productos.producto_id', $this->productosuc)
                ->groupBy('ventas.sucursal_id')
                ->get();
             $formattedData = [];
            foreach ($this->cantidadPorSucursal as $item) {
                switch ($item->sucursal_id) {
                    case 1:
                        $formattedData[] = ['sucursal' => 'EC', 'cantidad' => $item->cantidad_vendida];
                        break;
                    case 2:
                        $formattedData[] = ['sucursal' => 'OC', 'cantidad' => $item->cantidad_vendida];
                        break;
                    case 3:
                        $formattedData[] = ['sucursal' => 'FA', 'cantidad' => $item->cantidad_vendida];
                        break;
                    // Agrega más casos según sea necesario para otras sucursales
                }
            }
            $this->emit('graficoActualizado', $formattedData);
        }
        return view('livewire.dashboard.almacen');
    }
}
