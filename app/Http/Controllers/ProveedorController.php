<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
  public function proveedor()
  {
    return view('Proveedores.Bproveedor');
  }
  public function rproveedor()
  {
    return view('Proveedores.Rproveedor');
  }
  public function eproveedor($id){
    return view('Proveedores.Eproveedor', ['id' => $id]);
  }
}
