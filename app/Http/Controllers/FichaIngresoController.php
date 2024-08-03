<?php

namespace App\Http\Controllers;

use App\Models\FichaIngreso;
use App\Models\Movimientos;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FichaExport;
use Illuminate\Http\Request;

class FichaIngresoController extends Controller
{
  public function ficha()
  {
    return view('Fichas.Bficha');
  }
  public function rficha()
  {
    return view('Fichas.Rficha');
  }
  public function eficha($id)
  {
    return view('Fichas.Eficha', ['id' => $id]);
  }
  public function XLS($id)
  {
    // Obtén la ficha y los movimientos
    $Ficha = FichaIngreso::where('id', $id)->first();
    $Dep = Movimientos::where([['fichaD_id', $id],['Movimiento','Deposito']])->get();

    // Usa Excel::download para descargar el archivo
    return Excel::download(new FichaExport($Ficha, $Dep, 1), 'Ficha-' . $Ficha->Folio . '.xlsx');

  }
}
