<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class CreditoExport implements WithMultipleSheets
{
    protected $D1,$D2,$R;
    public function __construct($D1,$D2, $R){
        $this->D1 = $D1;
        $this->D2 = $D2;
        $this->R = $R;
    }
    public function sheets(): array
    {
        return [
            new ProductosSheet($this->D1), // Hoja 1
            new SucursalesSheet($this->D2), // Hoja 2
        ];
    }
    
    /**
    * @return View
    */
        public function view(): View
        {
            switch ($this->R) {
                case '1':
                    return view('excels/CreditosCompras',['compras'=>$this->D1,'pagos'=>$this->D2]);
                    break;
            }
        }
}
class ProductosSheet implements FromView, WithTitle
{
    protected $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('excels.DetalleVentasP', ['productos' => $this->productos]);
    }

    public function title(): string
    {
        return 'Productos';
    }
}
class SucursalesSheet implements FromView, WithTitle
{
    protected $sucursales;

    public function __construct($sucursales)
    {
        $this->sucursales = $sucursales;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('excels.DetalleVentasV', ['sucursales' => $sucursales]);
    }

    public function title(): string
    {
        return 'Sucursales';
    }
}