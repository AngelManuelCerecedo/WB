<?php

namespace App\Http\Livewire\FichaI;

use App\Models\Banco;
use App\Models\Cliente;
use App\Models\Comisiones;
use App\Models\Comisionista;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\FichaIngreso;
use Livewire\Component;

class Eficha extends Component
{
    public $ide, $Folio, $Fecha, $Total = 0, $TOTALRINT, $Comision, $Obs, $Estatus;
    public $searchC, $searchE, $Ficha, $Depositos, $Comisionistas;
    public $FechaDep, $Monto, $Bancos, $Banco, $FolioF, $NumeroF, $Cliente, $NomC1, $NomC2, $NomC3, $NomC4, $NomC5;
    public $comis1_id, $comis2_id, $comis3_id, $comis4_id, $comis5_id;
    public $CT, $PT, $GFT, $GFP, $CWB, $PWB = 0, $CET1, $CEP1 = 0, $CET2, $CEP2 = 0, $CET3, $CEP3 = 0, $CET4, $CEP4 = 0, $CET5, $CEP5 = 0, $AuxCOMWB;
    public function render()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        $this->Comisionistas = Comisionista::all();
        $this->Depositos = Depositos::where('ficha_id', $this->ide)->get();
        $Ficha = FichaIngreso::Where('id', '=', $this->ide)->first();
        $this->CT = ($this->PT) ? number_format(($this->PT * $Ficha->Total) / 100, 2, '.', ',') : 0.0;
        $this->GFT = ($this->GFP) ? number_format(($this->GFP * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        if ($this->PT && $this->GFP) {
            $this->PWB = $this->PT - $this->GFP;
            if ($this->CEP1 || $this->CEP2 || $this->CEP3 || $this->CEP4 || $this->CEP5) {
                $this->PWB = $this->PWB - $this->toFloat($this->CEP1) - $this->toFloat($this->CEP2) - $this->toFloat($this->CEP3) - $this->toFloat($this->CEP4) - $this->toFloat($this->CEP5);
            }
        }
        $this->CWB = ($this->PWB) ? number_format(($this->PWB * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->CET1 = ($this->CEP1) ? number_format(($this->CEP1 * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->CET2 = ($this->CEP2) ? number_format(($this->CEP2 * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->CET3 = ($this->CEP3) ? number_format(($this->CEP3 * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->CET4 = ($this->CEP4) ? number_format(($this->CEP4 * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->CET5 = ($this->CEP5) ? number_format(($this->CEP5 * $Ficha->Total) / 100, 2, '.', ',') : number_format(0, 2, '.', ',');
        $this->TOTALRINT = ($this->CT) ? number_format($this->Ficha->Total - (($this->PT * $Ficha->Total) / 100), 2, '.', ',') : number_format(0, 2, '.', ',') ;
        return view('livewire.fichai.eficha', ['Clientes' => $clientes, 'Empresas' => $empresas]);
    }


    private function toFloat($value)
    {
        return is_numeric($value) ? (float)$value : 0.0;
    }
    public function updatedSearchE($value)
    {
        $this->Bancos = Banco::where('empresa_id', $value)->get();
    }
    public function mount()
    {
        $this->Ficha = FichaIngreso::Where('id', '=', $this->ide)->first();
        $this->searchC = ($this->Ficha->cliente_id) ? $this->Ficha->cliente_id : null;
        $this->Cliente = ($this->Ficha->cliente_id) ? $this->Ficha->cliente->NOMBRE : null;
        $Nc1 = Comisionista::where('id', $this->Ficha->comis1_id)->first();
        $Nc2 = Comisionista::where('id', $this->Ficha->comis2_id)->first();
        $Nc3 = Comisionista::where('id', $this->Ficha->comis3_id)->first();
        $Nc4 = Comisionista::where('id', $this->Ficha->comis4_id)->first();
        $Nc5 = Comisionista::where('id', $this->Ficha->comis5_id)->first();
        $this->NomC1 = ($Nc1) ? $Nc1->Nombre : null;
        $this->NomC2 = ($Nc2) ? $Nc2->Nombre : null;
        $this->NomC3 = ($Nc3) ? $Nc3->Nombre : null;
        $this->NomC4 = ($Nc4) ? $Nc4->Nombre : null;
        $this->NomC5 = ($Nc5) ? $Nc5->Nombre : null;
        $this->Folio = $this->Ficha->Folio;
        $this->Fecha = $this->Ficha->Fecha;
        $this->Estatus = $this->Ficha->Estatus;
        $this->Obs = ($this->Ficha->Obs) ? $this->Ficha->Obs : '';
        $this->PT = ($this->Ficha->cliente) ? $this->Ficha->cliente->COMTOT : 0;
        $this->GFP = ($this->Ficha->cliente) ? $this->Ficha->cliente->COMFINTECH : 0;
        //$this->PWB = ($this->Ficha->cliente->) ? $this->PWB : 0;
        $this->comis1_id = $this->Ficha->comis1_id;
        $this->comis2_id = $this->Ficha->comis2_id;
        $this->comis3_id = $this->Ficha->comis3_id;
        $this->comis4_id = $this->Ficha->comis4_id;
        $this->comis5_id = $this->Ficha->comis5_id;
        $this->CEP1 =  $this->Ficha->Tot1;
        $this->CEP2 =  $this->Ficha->Tot2;
        $this->CEP3 =  $this->Ficha->Tot3;
        $this->CEP4 =  $this->Ficha->Tot4;
        $this->CEP5 =  $this->Ficha->Tot5;
    }
    public function agregarMov()
    {
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
    public function guardar()
    {
        FichaIngreso::updateOrCreate(
            ['id' => $this->ide],
            [
                'cliente_id' => $this->searchC,
                'Comision' => $this->PT,
                'GastosF' => $this->GFP,
                'ComisionWB' => $this->PWB,
                'Tot1' => $this->CEP1,
                'comis1_id' => ($this->comis1_id != 'NULL') ? $this->comis1_id : null,
                'Tot2' => $this->CEP2,
                'comis2_id' => ($this->comis2_id != 'NULL') ? $this->comis2_id : null,
                'Tot3' => $this->CEP3,
                'comis3_id' => ($this->comis3_id != 'NULL') ? $this->comis3_id : null,
                'Tot4' => $this->CEP4,
                'comis4_id' => ($this->comis4_id != 'NULL') ? $this->comis4_id : null,
                'Tot5' => $this->CEP5,
                'comis5_id' => ($this->comis5_id != 'NULL') ? $this->comis5_id : null,
                'Obs' => $this->Obs,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Ficha Guardada Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function ingresar()
    {
        $Depositos = Depositos::where('ficha_id', $this->ide)->get();
        foreach ($Depositos as $deposito) {
            $TotenC = Banco::where('id', $deposito->banco_id)->first();
            Banco::updateOrCreate(
                ['id' => $deposito->banco_id],
                [
                    'Total' => $deposito->Total + $TotenC->Total,
                ]
            );
        }
        FichaIngreso::updateOrCreate(
            ['id' => $this->ide],
            [
                'Estatus' => 'Ingresada',
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Ficha Ingresada Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        $Ficha = FichaIngreso::Where('Folio', '=', $this->Folio)->first();
        return redirect()->route('EFichaI', [$Ficha->id]);
    }
}
