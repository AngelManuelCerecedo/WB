<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function venta()
    {
      return view('ventas.Bventas');
    }
    public function rventa()
    {
      return view('ventas.Rventa');
    }
    public function pventa()
    {
      return view('ventas.PuntoVenta');
    }
    public function eventa($id){
      return view('ventas.Eventas', ['id' => $id]);
    }
    public function pventarcliente()
    {
      return view('ventas.PuntoVentaRCliente');
    }
    public function pventarcotizacion()
    {
      return view('ventas.PuntoVentaRCotizacion');
    }
    public function pventaecotizacion($id){
      return view('ventas.PuntoVentaECotizacion', ['id' => $id]);
    }
}
