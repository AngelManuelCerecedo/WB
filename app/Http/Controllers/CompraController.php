<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function compra()
    {
      return view('Compras.Bcompra');
    }
    public function rcompra()
    {
      return view('Compras.Rcompra');
    }
    public function ecompra($id){
      return view('Compras.Ecompra', ['id' => $id]);
    }
}
