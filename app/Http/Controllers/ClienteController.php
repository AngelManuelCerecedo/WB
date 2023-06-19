<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente()
    {
      return view('clientes.Bcliente');
    }
    public function rproveedor()
    {
      return view('clientes.Rcliente');
    }
    public function eproveedor($id){
      return view('clientes.Ecliente', ['id' => $id]);
    }
}
