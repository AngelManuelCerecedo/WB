<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InventarioExport implements FromView
{
    protected $productos , $R;
    public function __construct($productos, $R){
        $this->productos = $productos;
        $this->R = $R;
    }
    /**
    * @return View
    */
    public function view(): View
    {
        switch ($this->R) {
            case '1':
                return view('excels/InventarioP',['productos'=>$this->productos]);
                break;
            case '2':
                return view('excels/InventarioPC',['productos'=>$this->productos]);
                break;
            case '3':
                return view('excels/Productos',['productos'=>$this->productos]);
                break;
            case '4':
                return view('excels/InventarioPCE',['productos'=>$this->productos]);
                break;
            case '5':
                return view('excels/Traspasos',['traspasos'=>$this->productos]);
                break;
            case '6':
                return view('excels/Ventas',['ventas'=>$this->productos]);
                break;
            case '7':
                return view('excels/Caducidades',['productos'=>$this->productos]);
                break;
            case '8':
                return view('excels/Compras',['compras'=>$this->productos]);
                break;
            case '9':
                return view('excels/Promos',['productos'=>$this->productos]);
                break;
        }
    }
}
