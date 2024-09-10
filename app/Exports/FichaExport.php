<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FichaExport implements FromView, WithStyles
{
    protected $Ficha, $Mov, $R;
    
    public function __construct($Ficha, $Mov, $R)
    {
        $this->Ficha = $Ficha;
        $this->Mov = $Mov;
        $this->R = $R;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        switch ($this->R) {
            case '1':
                return view('excels/FichaDep', ['Ficha' => $this->Ficha, 'Mov' => $this->Mov]);
            case '2':
                return view('excels/SaldosEmp', ['Empresas' => $this->Ficha, 'Mov' => $this->Mov]);
            case '3':
                return view('excels/Gastos', ['Gastos' => $this->Ficha, 'Periodo' => $this->Mov]);
            default:
                // Maneja casos inesperados
                return view('excels/Default', ['Ficha' => $this->Ficha, 'Mov' => $this->Mov]);
        }
    }

    public function styles(Worksheet $sheet)
    {
        if ($this->R == 3){
            $sheet->getStyle('F:F')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
        }
    }
}
