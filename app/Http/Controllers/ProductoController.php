<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function producto()
    {
      return view('productos.Bproducto');
    }
    public function rproducto()
    {
      return view('productos.Rproducto');
    }
    public function eproducto($id){
      return view('productos.Eproducto', ['id' => $id]);
    }
}
