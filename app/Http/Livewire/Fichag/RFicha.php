<?php

namespace App\Http\Livewire\Fichag;

use App\Models\Banco;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\FichaGasto;
use App\Models\Beneficiario;
use App\Models\FormaPago;
use Livewire\Component;

class RFicha extends Component
{
    public $Folio, $Fecha, $Total, $Cuenta, $Obs, $Estatus,$Bene;
    public $searchE, $searchC, $Acreedor, $Acreedores;
    public $Monto, $FormaP, $Bancos,$Banco, $Factura, $FF;
    public function render()
    {
        $empresas = Empresa::all();
        $formasP = FormaPago::all();
        $Beneficiarios = Beneficiario::all();
        $this->Acreedores = Beneficiario::whereIn('id', [2, 3])->get();
        return view('livewire.Fichag.rficha', ['Empresas' => $empresas, 'FormasP' => $formasP,'Beneficiarios'=>$Beneficiarios]);
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $Folio = FichaGasto::latest()->first();
        $this->Folio = ($Folio) ? auth()->user()->empleado->Serie . $Folio->id + 1  : auth()->user()->empleado->Serie . '1';
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
                'bene_id' => $this->searchC,
                'Total' => $this->Monto,
                'formap_id' => $this->FormaP,
                'banco_id' => $this->Banco,
                'Cuenta' => $this->Banco,
                'empresa_id' => $this->searchE,
                'GastosF' => $this->Factura,
                'FolioFact' => $this->FF,
                'Estatus' => 'Registro',
                'Obs' => $this->Obs,
                'acreedor' => $this->Acreedor,
                'empleado_id' => auth()->user()->empleado->id,
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
