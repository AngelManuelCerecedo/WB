<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
  public function venta()
  {
    return view('Ventas.Bventas');
  }
  public function rventa()
  {
    return view('Ventas.Rventa');
  }
  public function pventa()
  {
    return view('Ventas.PuntoVenta');
  }
  public function eventa($id)
  {
    return view('Ventas.Eventas', ['id' => $id]);
  }
  public function pventarcliente()
  {
    return view('Ventas.PuntoVentaRCliente');
  }
  public function pventarcotizacion()
  {
    return view('Ventas.PuntoVentaRCotizacion');
  }
  public function pventaecotizacion($id)
  {
    return view('Ventas.PuntoVentaECotizacion', ['id' => $id]);
  }
  public function pventaeventa($id)
  {
    return view('Ventas.PuntoVentaEVenta', ['id' => $id]);
  }
  public function pventatraspaso()
  {
    return view('Ventas.PuntoVentaRTraspaso');
  }
  public function pventaetraspaso($id)
  {
    return view('Ventas.PuntoVentaETraspaso', ['id' => $id]);
  }
  public function pventaecredito($id)
  {
    return view('Ventas.PuntoVentaECredito', ['id' => $id]);
  }
}
