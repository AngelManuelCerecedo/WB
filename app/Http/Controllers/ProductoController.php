<?php

namespace App\Http\Controllers;

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
}
