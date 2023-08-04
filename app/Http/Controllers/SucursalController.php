<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function sucursal()
    {
      return view('sucursales.Bsucursal');
    }
    public function rsucursal()
    {
      return view('sucursales.Rsucursal');
    }
    public function esucursal($id){
      return view('sucursales.Esucursal', ['id' => $id]);
    }
}
