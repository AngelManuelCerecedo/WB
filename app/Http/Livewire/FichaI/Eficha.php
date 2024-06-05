<?php

namespace App\Http\Livewire\FichaI;

use App\Models\Banco;
use App\Models\Cliente;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\FichaIngreso;
use Livewire\Component;

class Eficha extends Component
{
    public $ide,$Folio,$Fecha,$Total=0,$Comision,$Obs,$Estatus;
    public $searchC,$searchE, $Ficha,$Depositos;
    public $FechaDep,$Monto,$Bancos,$Banco,$FolioF,$NumeroF;
    public $CT,$PT,$GFT,$GFP,$CWB,$PWB,$CET1,$CEP1,$CET2,$CEP2,$CET3,$CEP3,$CET4,$CEP4,$CET5,$CEP5;
    public function render()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        $this->Depositos = Depositos::where('ficha_id', $this->ide)->get();
        $Ficha = FichaIngreso::Where('id', '=', $this->ide)->first();
        $this->CT = ($this->PT) ? ($this->PT * $Ficha->Total)/100 : 0;
        return view('livewire.fichai.eficha', ['Clientes' => $clientes,'Empresas'=>$empresas]);
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount(){

        $this->Ficha = FichaIngreso::Where('id', '=', $this->ide)->first();
        $this->searchC = ($this->Ficha->cliente_id) ? $this->Ficha->cliente_id : null;
        $this->Folio = $this->Ficha->Folio;
        $this->Fecha = $this->Ficha->Fecha;
        $this->Estatus = $this->Ficha->Estatus;
        $this->Obs = ($this->Ficha->Obs) ? $this->Ficha->Obs : '' ;
        $this->PT = ($this->Ficha->cliente->COMTOT) ? $this->Ficha->cliente->COMTOT : 0;
        $this->GFP = ($this->Ficha->cliente->COMFINTECH) ? $this->Ficha->cliente->COMFINTECH : 0;
        //$this->PWB = ($this->Ficha->cliente->) ? $this->PWB : 0;
        $this->CEP1 = ($this->Ficha->cliente->COMEXT1) ? $this->Ficha->cliente->COMEXT1 : 0;
        $this->CEP2 = ($this->Ficha->cliente->COMEXT2) ? $this->Ficha->cliente->COMEXT2 : 0;
        $this->CEP3 = ($this->Ficha->cliente->COMEXT3) ? $this->Ficha->cliente->COMEXT3 : 0;
        $this->CEP4 = ($this->Ficha->cliente->COMEXT4) ? $this->Ficha->cliente->COMEXT4 : 0;
        $this->CEP5 = ($this->Ficha->cliente->COMEXT5) ? $this->Ficha->cliente->COMEXT5 : 0;

    }
    public function agregarMov(){
        if ($this->Fecha && $this->Banco && $this->Monto) {
            Depositos::create(
                [
                    'Fecha' => $this->Fecha,
                    'Total' => $this->Monto,
                    'FolioF' => $this->FolioF,
                    'NumeroF' => $this->NumeroF,
                    'empresa_id' => $this->searchE,
                    'banco_id' => $this->Banco,
                    'ficha_id' => $this->ide,
                    //AGREGAR AL USUARIO
                ]
            );
            $Taux = 0;
            $Depositos = Depositos::where('ficha_id', $this->ide)->get();
            foreach ($Depositos as $deposito) {
                $Taux += $deposito->Total;   
            }
            FichaIngreso::updateOrCreate(
                ['id' => $this->ide],
                [
                    'Total' => $Taux,
                    'cliente_id' => $this->searchC,
                ]
            );
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Registro Guardado Exitosamente',
                'type' => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Ingresa Los Datos Solicitados',
                'type' => 'error'
            ]);
        }

    }
}
