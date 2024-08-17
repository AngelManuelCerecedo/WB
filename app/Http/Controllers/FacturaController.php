<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function factura()
    {
      return view('Facturas.Bfactura');
    }
    public function rfactura()
    {
      return view('Facturas.Rfactura');
    }
    public function efactura($id)
    {
      return view('Facturas.Efactura', ['id' => $id]);
    }
}
