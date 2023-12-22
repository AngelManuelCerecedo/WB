<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
    public function ecliente($id){
      return view('Clientes.Ecliente', ['id' => $id]);
    }
    public function PDF()
    {
        $clientes = Cliente::all();
        $pdf = PDF::loadView('pdfs.Listado', ['clientes' => $clientes, 'aux' => true]);
        $pdf->setPaper('letter','landscape');
        return $pdf->stream('Clientes.pdf');
    }
}
