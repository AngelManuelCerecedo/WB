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
    public function ecliente($id){
      return view('Clientes.Ecliente', ['id' => $id]);
    }
    public function PDF()
    {
        $clientes = Cliente::select(
    'clientes.*', 
    Venta::raw('COUNT(ventas.id) as total_ventas')  // Contar el número total de ventas
)
->leftJoin('ventas', 'clientes.id', '=', 'ventas.cliente_id')  // Unir con ventas
->groupBy('clientes.id', 'clientes.nombre' ,'clientes.ApP' ,'clientes.ApM' ,'clientes.TipoC','clientes.Clasificacion','clientes.NomCom','clientes.DomicilioF','clientes.Reg','clientes.CFDI','clientes.TipoP','clientes.RFC','clientes.Tel','clientes.Cel','clientes.Correo'
,'clientes.CP','clientes.Estado','clientes.Mun','clientes.Col','clientes.Calle','clientes.Referencia','clientes.NumExt','clientes.NumInt','clientes.Credito','clientes.NomRF','clientes.ParenRF','clientes.TelRF','clientes.DomRF','clientes.created_at','clientes.updated_at')
->get();

        $pdf = PDF::loadView('pdfs.Listado', ['clientes' => $clientes, 'aux' => true]);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('Clientes.pdf');
    }
    public function Estado($id)
    {
        $tp=0;
        $cliente = Cliente::find($id);
        $creditos = Credito::all();
        $pagos = Pago_Credito::all();
        $ventas = Venta::where('cliente_id', $id)->get();
        $pdf = PDF::loadView('pdfs.Estado', ['tp'=>$tp,'ventas'=>$ventas,'cliente'=>$cliente,'creditos' => $creditos,'pagos' => $pagos, 'aux' => true]);
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('EstadodeCuenta'.$cliente->Nombre.'.pdf');
    }
}
