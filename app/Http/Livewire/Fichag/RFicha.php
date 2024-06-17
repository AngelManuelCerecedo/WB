<?php

namespace App\Http\Livewire\Fichag;

use App\Models\Banco;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\FichaGasto;
use App\Models\FormaPago;
use Livewire\Component;

class RFicha extends Component
{
    public $Folio, $Fecha, $Total, $Cuenta, $Obs, $Estatus,$Bene;
    public $searchE;
    public $Monto, $FormaP, $Bancos,$Banco, $Factura, $FF;
    public function render()
    {
        $empresas = Empresa::all();
        $formasP = FormaPago::all();
        return view('livewire.fichag.rficha', ['Empresas' => $empresas, 'FormasP' => $formasP]);
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $Folio = FichaGasto::latest()->first();
        $this->Folio = ($Folio) ? $Folio->id + 1 . 'AA' : '1AA'; //SERIE VARIABLE 
        $this->Fecha = date('Y-m-d');
        $this->Estatus = 'Registro';
        $this->Obs = '';
    }
    public function guardar()
    {
        FichaGasto::updateOrCreate(
            [
                'Folio' => $this->Folio,
                'Fecha' => $this->Fecha,
                'Beneficiario' => $this->Bene,
                'Total' => $this->Monto,
                'formap_id' => $this->FormaP,
                'banco_id' => $this->searchE,
                'Cuenta' => $this->Banco,
                'empresa_id' => $this->searchE,
                'GastosF' => $this->Factura,
                'FolioFact' => $this->FF,
                'Estatus' => 'Registro',
                'Obs' => $this->Obs,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Ficha Guardada Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        $Ficha = FichaGasto::Where('Folio', '=', $this->Folio)->first();
        return redirect()->route('EFichaG', [$Ficha->id]);
    }
}
