<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function sucursal()
    {
      return view('Sucursales.Bsucursal');
    }
    public function rsucursal()
    {
      return view('Sucursales.Rsucursal');
    }
    public function esucursal($id){
      return view('Sucursales.Esucursal', ['id' => $id]);
    }
}
