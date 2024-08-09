<?php

namespace App\Http\Livewire\Comisionista;

use App\Models\Banco;
use App\Models\Comisionista;
use App\Models\Empresa;
use App\Models\FichaGasto;
use App\Models\FichaIngreso;
use App\Models\FormaPago;
use App\Models\Movimientos;
use Livewire\Component;

class Ecomisionista extends Component
{
    public $ide, $Nom, $Total, $Comisiones, $FormaP, $searchE, $Banco, $PagosCom;
    public $ModalPag = false, $ModalDet= false;
    public $Empresas, $FormasP, $Bancos, $Bene, $Concepto, $Monto = 0.00, $FichaIid, $Fecha, $AuxCom, $AuxComPendiente;
    public $Movimientos;
    public function render()
    {
        $this->Empresas = Empresa::all();
        $this->FormasP = FormaPago::all();
        $this->PagosCom = Movimientos::Where('comisionista_id', $this->ide)->get();
        if ($this->ide == '11' || $this->ide == '12'){
            $this->Comisiones = FichaIngreso::Where([['Estatus', 'Ingresada'], ['ComisionWB','!=', '']])->get();
        }else{
            $this->Comisiones = FichaIngreso::Where([['Estatus', 'Ingresada'], ['comis1_id', $this->ide]])
                ->orWhere([['Estatus', 'Ingresada'], ['comis2_id', $this->ide]])
                ->orWhere([['Estatus', 'Ingresada'], ['comis3_id', $this->ide]])
                ->orWhere([['Estatus', 'Ingresada'], ['comis4_id', $this->ide]])
                ->orWhere([['Estatus', 'Ingresada'], ['comis5_id', $this->ide]])->get(); 
        }
        return view('livewire.Comisionista.Ecomisionista');
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $comisionista = Comisionista::where('id', $this->ide)->first();
        $this->Nom = $comisionista->Nombre;
        $this->FormaP = 1;
    }
    public function actualizar()
    {
        Comisionista::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->Nom,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function abrirModal($fichaing)
    {
        $this->ModalPag = true;
        $this->FichaIid = $fichaing;
    }
    public function cerrarModal()
    {
        $this->limpiarMod();
        $this->ModalPag = false;
    }
    public function abrirModalDet($idF)
    {
        $this->Movimientos = Movimientos::Where([['fichaD_id', $idF], ['comisionista_id', $this->ide]])->get();
        $this->ModalDet = true;
    }
    public function cerrarModalDet()
    {
        $this->ModalDet = false;
    }
    public function pagar()
    {
        $Cuenta = Banco::where('id', $this->Banco)->first();
        Banco::updateOrCreate(
            ['id' => $this->Banco],
            [
                'Total' => $Cuenta->Total - $this->Monto,
            ]
        );
        Movimientos::create(
            [
                'Movimiento' => 'Pago Comision',
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'Beneficiario' => $this->Bene,
                'Concepto' => $this->Concepto,
                'banco_id' => $this->Banco,
                'empresa_id' => $this->searchE,
                'fichaD_id' => $this->FichaIid,
                'comisionista_id' => $this->ide,
                'formap_id' => $this->FormaP,
                'empleado_id' => auth()->user()->empleado->id,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Pago Realizado',
            'type' => 'success'
        ]);
        $this->cerrarModal();
    }
    public function limpiarMod(){
        $this->Fecha = 0;
        $this->Banco = 0;
        $this->searchE = 0;
        $this->Monto = 0.00;
    }
    public function redic()
    {
        $comisionista = Comisionista::latest()->first();
        return redirect()->route('EComisionista', [$comisionista->id]);
    }
}
