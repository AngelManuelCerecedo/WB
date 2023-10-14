<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function compra()
    {
      return view('compras.Bcompra');
    }
    public function rcompra()
    {
      return view('compras.Rcompra');
    }
    public function ecompra($id){
      return view('compras.Ecompra', ['id' => $id]);
    }
}
