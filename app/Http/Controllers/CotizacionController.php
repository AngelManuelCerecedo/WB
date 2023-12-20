<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function cotizacion()
    {
      return view('Cotizaciones.Bcotizacion');
    }
    public function rcotizacion()
    {
      return view('Cotizaciones.Rcotizacion');
    }
    public function ecotizacion($id){
      return view('Cotizaciones.Ecotizacion', ['id' => $id]);
    }
}
