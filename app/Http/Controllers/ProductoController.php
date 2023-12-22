<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function producto()
    {
      return view('Productos.Bproducto');
    }
    public function rproducto()
    {
      return view('Productos.Rproducto');
    }
    public function eproducto($id){
      return view('Productos.Eproducto', ['id' => $id]);
    }
    public function Inventario($id)
    {
      $productos = Producto::Where([['marca_id', $id]])->get();
        $pdf = PDF::loadView('pdfs.ListadoP', ['Productos' => $productos, 'aux' => true]);
        $pdf->setPaper('letter','landscape');
        return $pdf->download('Inventario -'.' SUCURSAL'.'.pdf');
    }
}
