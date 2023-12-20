<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente()
    {
      return view('Clientes.Bcliente');
    }
    public function rcliente()
    {
      return view('Clientes.Rcliente');
    }
    public function ecliente($id){
      return view('Clientes.Ecliente', ['id' => $id]);
    }
}
