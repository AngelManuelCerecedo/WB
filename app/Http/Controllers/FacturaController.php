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
    public function factura2()
    {
      return view('Facturas.Bfactura2');
    }
    public function rfactura2()
    {
      return view('Facturas.Rfactura2');
    }
    public function efactura2($id)
    {
      return view('Facturas.Efactura2', ['id' => $id]);
    }
}
