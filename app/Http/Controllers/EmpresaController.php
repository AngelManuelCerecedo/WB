<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FichaExport;
use App\Models\Banco;
use App\Models\Movimientos;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpresaController extends Controller
{
  public function empresa()
  {
    return view('Empresas.Bempresa');
  }
  public function rempresa()
  {
    return view('Empresas.Rempresa');
  }
  public function eempresa($id)
  {
    return view('Empresas.Eempresa', ['id' => $id]);
  }
  public function XLS()
  {
    // Obtén la ficha y los movimientos
    $Empresas = Empresa::all();
    // Usa Excel::download para descargar el archivo
    return Excel::download(new FichaExport($Empresas, $Empresas, 2), 'SaldosEmpresas.xlsx');
  }
  public function PDF($idEmp, $id)
  {
    $Empresa = Empresa::where('id', $idEmp)->first();
    $Banco = Banco::where('id', $id)->first();
$Movimientos = Movimientos::where('bancoD_id', $id)
    ->orWhere('banco_id', $id)
    ->orderBy('Fecha', 'asc')  // Ordenar por fecha de manera descendente
    ->orderBy('id', 'asc')      // Luego ordenar por ID de manera ascendente
    ->get();
    $pdf = PDF::loadView('pdfs.Estado', ['Empresa' => $Empresa, 'Movimientos' => $Movimientos, 'Banco' => $Banco]);
    return $pdf->stream('EstadoCuenta-' . $Empresa->NCorto . '.pdf');
  }
}
