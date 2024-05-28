<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Pago_Credito;
use App\Models\Credito;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
  public function ecliente($id)
  {
    return view('Clientes.Ecliente', ['id' => $id]);
  }
}
