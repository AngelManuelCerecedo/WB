<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Banco;
use App\Models\Cliente;
use App\Models\Comisionista;
use App\Models\Empresa;
use App\Models\FichaIngreso;
use App\Models\FormaPago;
use App\Models\Movimientos;
use Livewire\Component;

class Ecliente extends Component
{
    public $ide, $Alias, $Nom, $RS, $RFC, $CP, $DomF, $Reg, $CDFI, $Comext1, $comis1_id, $Comext2, $comis2_id, $Comext3, $comis3_id, $Comext4, $comis4_id, $Comext5, $comis5_id, $ComTot, $COMFINTECH;
    public $Comisionistas, $Empresas, $FormasP, $PagosCom, $Reintegros, $Bancos;
    public $AuxCom, $AuxComPendiente, $ModalPag, $ModalDet, $ModalAnt,$FichaIid;
    public $Fecha, $Banco, $searchE, $Monto, $Bene, $Concepto, $FormaP, $Movimientos;
    public function render()
    {
        $this->Empresas = Empresa::all();
        $this->FormasP = FormaPago::all();
        $this->PagosCom = Movimientos::Where([['cliente_id', $this->ide],['Movimiento','Pago Reintegro']])->get();
        $this->Reintegros = FichaIngreso::where([['Estatus', 'Ingresada'],['cliente_id', $this->ide]])->orderBy('Fecha', 'desc')->get();
        return view('livewire.Cliente.Ecliente');
    }
    public function mount($ide)
    {
        $this->Comisionistas = Comisionista::all();
        $cliente = Cliente::where('id', $ide)->first();
        $this->Nom = $cliente->NOMBRE;
        $this->Alias = $cliente->ALIAS;
        $this->RS = $cliente->RS;
        $this->RFC = $cliente->RFC;
        $this->CP = $cliente->CP;
        $this->DomF = $cliente->DOMF;
        $this->Reg = $cliente->REG;
        $this->CDFI = $cliente->CFDI;
        $this->Comext1 = $cliente->COMEXT1;
        $this->comis1_id = $cliente->comis1_id;
        $this->Comext2 = $cliente->COMEXT2;
        $this->comis2_id = $cliente->comis2_id;
        $this->Comext3 = $cliente->COMEXT3;
        $this->comis3_id = $cliente->comis3_id;
        $this->Comext4 = $cliente->COMEXT4;
        $this->comis4_id = $cliente->comis4_id;
        $this->Comext5 = $cliente->COMEXT5;
        $this->comis5_id = $cliente->comis5_id;
        $this->ComTot = $cliente->COMTOT;
        $this->COMFINTECH = $cliente->COMFINTECH;
        $this->FormaP = 1;
    }
    public function actualizar()
    {
        $this->comis1_id = ($this->comis1_id == 'NULL') ? null : $this->comis1_id;
        $this->comis2_id = ($this->comis2_id == 'NULL') ? null : $this->comis2_id;
        $this->comis3_id = ($this->comis3_id == 'NULL') ? null : $this->comis3_id;
        $this->comis4_id = ($this->comis4_id == 'NULL') ? null : $this->comis4_id;
        $this->comis5_id = ($this->comis5_id == 'NULL') ? null : $this->comis5_id;
        Cliente::updateOrCreate(
            ['id' => $this->ide],
            [
                'NOMBRE' => $this->Nom,
                'ALIAS' => $this->Alias,
                'RS' => $this->RS,
                'RFC' => $this->RFC,
                'CP' => $this->CP,
                'DOMF' => $this->DomF,
                'REG' => $this->Reg,
                'CFDI' => $this->CDFI,
                'COMEXT1' => $this->Comext1,
                'comis1_id' => $this->comis1_id,
                'COMEXT2' => $this->Comext2,
                'comis2_id' => $this->comis2_id,
                'COMEXT3' => $this->Comext3,
                'comis3_id' => $this->comis3_id,
                'COMEXT4' => $this->Comext4,
                'comis4_id' => $this->comis4_id,
                'COMEXT5' => $this->Comext5,
                'comis5_id' => $this->comis5_id,
                'COMTOT' => $this->ComTot,
                'COMFINTECH' => $this->COMFINTECH,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
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
        return redirect()->route('ECliente', [$this->ide]);
    }
    public function abrirModalDet($idF)
    {
        $this->Movimientos = Movimientos::Where([['Movimiento','Pago Reintegro'],['fichaD_id', $idF], ['cliente_id', $this->ide]])->get();
        $this->ModalDet = true;
    }
    public function cerrarModalDet()
    {
        $this->ModalDet = false;
        return redirect()->route('ECliente', [$this->ide]);
    }    
    public function abrirModalAnt()
    {
        $this->ModalAnt = true;
    }
    public function cerrarModalAnt()
    {
        $this->limpiarMod();
        $this->ModalAnt = false;
        return redirect()->route('ECliente', [$this->ide]);
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
                'Movimiento' => 'Pago Reintegro',
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'Beneficiario' => $this->Bene,
                'Concepto' => $this->Concepto,
                'banco_id' => $this->Banco,
                'empresa_id' => $this->searchE,
                'fichaD_id' => $this->FichaIid,
                'cliente_id' => $this->ide,
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
    public function pagarAnt()
    {
        $Folio = FichaIngreso::latest()->first();
        $Folio = ($Folio) ? auth()->user()->empleado->Serie . $Folio->id + 1  : auth()->user()->empleado->Serie . '1';
        $cliente = Cliente::Where('id', $this->ide)->first();
        FichaIngreso::updateOrCreate(
            [
                'Folio' => $Folio,
                'Fecha' => date('Y-m-d'),
                'Estatus' => 'Registro',
                'cliente_id' => $this->ide,
                'Total' => 0,
                'Tot1' => ($cliente->COMEXT1) ? $cliente->COMEXT1 : 0,
                'comis1_id' => ($cliente->comis1_id) ? $cliente->comis1_id : null,
                'Tot2' => ($cliente->COMEXT2) ? $cliente->COMEXT2 : 0,
                'comis2_id' => ($cliente->comis2_id) ? $cliente->comis2_id : null,
                'Tot3' => ($cliente->COMEXT3) ? $cliente->COMEXT3 : 0,
                'comis3_id' => ($cliente->comis3_id) ? $cliente->comis3_id : null,
                'Tot4' => ($cliente->COMEXT4) ? $cliente->COMEXT4 : 0,
                'comis4_id' => ($cliente->comis4_id) ? $cliente->comis4_id : null,
                'Tot5' => ($cliente->COMEXT5) ? $cliente->COMEXT5 : 0,
                'comis5_id' => ($cliente->comis5_id) ? $cliente->comis5_id : null,
                'empleado_id' => auth()->user()->empleado->id,
                'Obs' => '',
            ]
        );
        $Fid = FichaIngreso::latest()->first();
        $Cuenta = Banco::where('id', $this->Banco)->first();
        Banco::updateOrCreate(
            ['id' => $this->Banco],
            [
                'Total' => $Cuenta->Total - $this->Monto,
            ]
        );
        Movimientos::create(
            [
                'Movimiento' => 'Pago Reintegro',
                'Fecha' => $this->Fecha,
                'Total' => $this->Monto,
                'Beneficiario' => $this->Bene,
                'Concepto' => $this->Concepto,
                'banco_id' => $this->Banco,
                'empresa_id' => $this->searchE,
                'fichaD_id' => $Fid,
                'cliente_id' => $this->ide,
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
    public function limpiarMod()
    {
        $this->Fecha = 0;
        $this->Banco = 0;
        $this->searchE = 0;
        $this->Bene = '';
        $this->Concepto = '';
        $this->Monto = 0.00;
    }
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
