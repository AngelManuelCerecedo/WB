<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FichaExport implements FromView
{
    protected $Ficha, $Mov, $R, $Total;
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
                break;
            case '2':
                    return view('excels/SaldosEmp', ['Empresas' => $this->Ficha, 'Mov' => $this->Mov]);
                    break;
        }
    }
}
