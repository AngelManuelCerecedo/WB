<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

// Clase para exportar varias hojas
class ReportExport implements WithMultipleSheets
{
    protected $productos;
    protected $sucursales;
    protected $precios;
    protected $existencias;

    public function __construct($productos, $sucursales,$precios,$existencias)
    {
        $this->productos = $productos;
        $this->sucursales = $sucursales;
        $this->precios = $precios;
        $this->existencias= $existencias;
    }

    public function sheets(): array
    {
        return [
            new ProductosSheet($this->productos,$this->existencias), // Hoja 1
            new SucursalesSheet($this->sucursales), // Hoja 2
            new PreciosSheet($this->precios), // Hoja 3
        ];
    }
}

// Clase para la hoja de productos
class ProductosSheet implements FromView, WithTitle
{
    protected $productos;

    public function __construct($productos,$existencias)
    {
        $this->productos = $productos;
        $this->existencias= $existencias;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('excels.DetalleVentasP', ['productos' => $this->productos,'existencias' => $this->existencias,'flag' => '0']);
    }

    public function title(): string
    {
        return 'Productos';
    }
}

// Clase para la hoja de sucursales
class SucursalesSheet implements FromView, WithTitle
{
    protected $sucursales;

    public function __construct($sucursales)
    {
        $this->sucursales = $sucursales;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('excels.DetalleVentasV', ['sucursales' => $this->sucursales]);
    }

    public function title(): string
    {
        return 'Sucursales';
    }
}
class PreciosSheet implements FromView, WithTitle
{
    protected $precios;

    public function __construct($precios)
    {
        $this->precios = $precios;
    }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('excels.DetalleVentasPr', ['precios' => $this->precios]);
    }

    public function title(): string
    {
        return 'Precios';
    }
}
