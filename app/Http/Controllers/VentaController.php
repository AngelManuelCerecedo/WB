<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Venta_Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
  public function ticket($id)
  {
    //$Cot = Cotizacion::Where('Folio', '=', $this->Folio)->first();
      $productos = Venta_Producto::Where('venta_id',$id)->get();
      $venta = Venta::Where('id',$id)->first();
      $pdf = PDF::loadView('pdfs.ticket', ['productos' => $productos, 'venta' => $venta]);
      $pdf->setPaper(array(0,0,240, 600),'portrait');
      return $pdf->stream('Venta'.$venta->Folio.'pdf');
  }
}
