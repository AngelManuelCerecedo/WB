<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function cotizacion()
    {
      return view('cotizaciones.Bcotizacion');
    }
    public function rcotizacion()
    {
      return view('cotizaciones.Rcotizacion');
    }
    public function ecotizacion($id){
      return view('cotizaciones.Ecotizacion', ['id' => $id]);
    }
}
