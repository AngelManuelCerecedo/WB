<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaGasto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FichaExport;
class FichaGastosController extends Controller
{
    public function ficha()
    {
        return view('FichaG.Bficha');
    }
    public function rficha()
    {
        return view('FichaG.Rficha');
    }
    public function eficha($id)
    {
        return view('FichaG.Eficha', ['id' => $id]);
    }
     public function XLS($Fecha1, $Fecha2)
      {
        $Gastos = FichaGasto::whereBetween('Fecha', [$Fecha1, $Fecha2])->get();
        $Periodo = strtoupper(\Carbon\Carbon::parse($Fecha1)->locale('es')->isoFormat('MMMM'));
        // Usa Excel::download para descargar el archivo
        return Excel::download(new FichaExport($Gastos, $Periodo, 3), 'SaldosEmpresas.xlsx');
      }
}
