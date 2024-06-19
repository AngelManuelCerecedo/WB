<?php

namespace App\Http\Livewire\Fichag;

use App\Models\Banco;
use App\Models\Empresa;
use App\Models\FichaGasto;
use App\Models\FormaPago;
use App\Models\Gastos;
use Livewire\Component;

class EFicha extends Component
{
    public $Folio, $Fecha, $Total, $Comision, $Obs, $Estatus, $Bene;
    public $searchE, $ide, $Ficha, $empresaSeleccionadaId;
    public $Monto, $FormaP, $Bancos, $Banco, $Factura, $FF;
    public function render()
    {
        $empresas = Empresa::all();
        $formasP = FormaPago::all();
        return view('livewire.fichag.eficha', ['Empresas' => $empresas, 'FormasP' => $formasP]);
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $this->Ficha = FichaGasto::Where('id', '=', $this->ide)->first();
        $this->Bancos = Banco::where('empresa_id', $this->Ficha->empresa_id)->get();
        $this->Folio = $this->Ficha->Folio;
        $this->Bene = $this->Ficha->Beneficiario;
        $this->Monto = $this->Ficha->Total;
        $this->Fecha = $this->Ficha->Fecha;
        $this->empresaSeleccionadaId = $this->Ficha->empresa_id;
        $this->Banco = $this->Ficha->banco_id;
        $this->Monto = $this->Ficha->Total;
        $this->Factura = $this->Ficha->GastosF;
        $this->FF = $this->Ficha->FolioFact;
        $this->Estatus = $this->Ficha->Estatus;
        $this->Obs = $this->Ficha->Obs;
        $this->FormaP = $this->Ficha->formap_id;
    }
    public function guardar()
    {
        FichaGasto::updateOrCreate(
            ['id' => $this->ide],
            [
                'Folio' => $this->Folio,
                'Fecha' => $this->Fecha,
                'Beneficiario' => $this->Bene,
                'Total' => $this->Monto,
                'formap_id' => $this->FormaP,
                'banco_id' => $this->Banco,
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'GastosF' => ($this->Factura) ? $this->Factura : null,
                'FolioFact' => ($this->Factura) ? $this->FF : null,
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
    public function ingresar(){
        $Cuenta = Banco::where('id', $this->Banco)->first();
        Banco::updateOrCreate(
            ['id' => $this->Banco],
            [
                'Total' => $Cuenta->Total - $this->Monto,
            ]
        );
        FichaGasto::updateOrCreate(
            ['id' => $this->ide],
            [
                'Estatus' => 'Ingresada',
            ]
        );
        Gastos::create(
            [
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'FolioF' => ($this->Factura) ? $this->FF : null,
                'banco_id' => $this->Banco,
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'ficha_id' => $this->ide,
                //AGREGAR AL USUARIO
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
        $Ficha = FichaGasto::Where('id', '=', $this->ide)->first();
        return redirect()->route('EFichaG', [$Ficha->id]);
    }
}
