<?php

namespace App\Http\Livewire\Fichag;

use App\Models\Banco;
use App\Models\Empresa;
use App\Models\FichaGasto;
use App\Models\FormaPago;
use App\Models\Beneficiario;
use App\Models\Movimientos;
use Livewire\Component;

class EFicha extends Component
{
    public $Folio, $Fecha, $Total, $Comision, $Obs, $Estatus, $Bene;
    public $searchE, $ide, $Ficha, $empresaSeleccionadaId, $searchC, $Acreedores,$Acreedor;
    public $Monto, $FormaP, $Bancos, $Banco, $Factura, $FF;
    public function render()
    {
        $empresas = Empresa::all();
        $formasP = FormaPago::all();
        $Beneficiarios = Beneficiario::all();
        $this->Acreedores = Beneficiario::whereIn('id', [2, 3])->get();
        return view('livewire.Fichag.eficha', ['Empresas' => $empresas, 'FormasP' => $formasP,'Beneficiarios'=>$Beneficiarios]);
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $this->Ficha = FichaGasto::Where('id', $this->ide)->first();
        $this->Bancos = Banco::where('empresa_id', $this->Ficha->empresa_id)->get();
        $this->Folio = $this->Ficha->Folio;
        $this->searchC = ($this->Ficha->bene_id) ? $this->Ficha->bene_id : null;
        $this->Bene = ($this->Ficha->bene_id) ? $this->Ficha->beneficiario->Nombre : null;
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
        $this->Acreedor = $this->Ficha->acreedor;
    }
    public function guardar()
    {
        FichaGasto::updateOrCreate(
            ['id' => $this->ide],
            [
                'Folio' => $this->Folio,
                'Fecha' => $this->Fecha,
                'bene_id' => $this->searchC,
                'Total' => $this->Monto,
                'formap_id' => $this->FormaP,
                'banco_id' => $this->Banco,
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'GastosF' => ($this->Factura) ? $this->Factura : null,
                'FolioFact' => ($this->Factura) ? $this->FF : null,
                'Estatus' => 'Registro',
                'Obs' => $this->Obs,
                'acreedor' => $this->Acreedor,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Ficha Guardada Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function ingresar(){
        $this->guardar();
        $Cuenta = Banco::where('id', $this->Banco)->first();
        Banco::updateOrCreate(
            ['id' => $this->Banco],
            [
                'Total' => $Cuenta->Total - $this->Monto,
            ]
        );
        Movimientos::create(
            [
                'Movimiento' => 'Gasto',
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'FolioF' => ($this->Factura) ? $this->FF : null,
                'banco_id' => $this->Banco,
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'fichaG_id' => $this->ide,
                'empleado_id' => auth()->user()->empleado->id,
            ]
        );
        switch ($this->Acreedor) {
            case '2':
                $TotCOMWB = Banco::where('id', 70)->first();
                Banco::updateOrCreate(
                    ['id' => 70],
                    [
                        'Total' => $TotCOMWB->Total - $this->Monto,
                    ]
                );
                $bancoaux = 70;
                break;
            case '3':
                $TotCOMWB = Banco::where('id', 71)->first();
                Banco::updateOrCreate(
                    ['id' => 71],
                    [
                        'Total' => $TotCOMWB->Total - $this->Monto,
                    ]
                );
                $bancoaux = 71;
                break;
            default:
                $TotCOMWB = Banco::where('id', 72)->first();
                Banco::updateOrCreate(
                    ['id' => 72],
                    [
                        'Total' => $TotCOMWB->Total - $this->Monto,
                    ]
                );
                $bancoaux = 72;
                break;
        }
        switch ($this->searchC) {
            case '2':
                $TotCOMWB = Banco::where('id', 70)->first();
                Banco::updateOrCreate(
                    ['id' => 70],
                    [
                        'Total' => $TotCOMWB->Total + $this->Monto,
                    ]
                );
                $bancoaux = 70;
                break;
            case '3':
                $TotCOMWB = Banco::where('id', 71)->first();
                Banco::updateOrCreate(
                    ['id' => 71],
                    [
                        'Total' => $TotCOMWB->Total + $this->Monto,
                    ]
                );
                $bancoaux = 71;
                break;
        }
        Movimientos::create(
            [
                'Movimiento' => 'Gasto',
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'FolioF' => ($this->Factura) ? $this->FF : null,
                'banco_id' => $bancoaux,
                'empresa_id' => 67,
                'fichaG_id' => $this->ide,
                'empleado_id' => auth()->user()->empleado->id,
            ]
        );
        FichaGasto::updateOrCreate(
            ['id' => $this->ide],
            [
                'Folio' => $this->Folio,
                'Fecha' => $this->Fecha,
                'bene_id' => $this->searchC,
                'Total' => $this->Monto,
                'formap_id' => $this->FormaP,
                'banco_id' => $this->Banco,
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'GastosF' => ($this->Factura) ? $this->Factura : null,
                'FolioFact' => ($this->Factura) ? $this->FF : null,
                'Estatus' => 'Ingresada',
                'Obs' => $this->Obs,
                'acreedor' => $this->Acreedor,
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
