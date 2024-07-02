<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Comisionista;
use Livewire\Component;

class Rcliente extends Component
{
    public $ide, $Alias,$Nom, $RS, $RFC, $CP, $DomF, $Reg, $CDFI, $Comext1, $comis1_id, $Comext2, $comis2_id, $Comext3, $comis3_id, $Comext4, $comis4_id, $Comext5, $comis5_id, $ComTot, $ComFin;
    public $Comisionistas;
    public function render()
    {
        $this->Comisionistas = Comisionista::all();
        return view('livewire.Cliente.Rcliente');
    }
    public function registrar(){
        Cliente::updateOrCreate(
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
                'COMFINTECH' => $this->ComFin,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->limpiar();
        $this->redic();
    }
    public function limpiar()
    {
        $this->Nom = '';
        $this->Alias = '';
        $this->RS = '';
        $this->RFC = '';
        $this->CP = '';
        $this->DomF = '';
        $this->Reg = '';
        $this->CDFI = '';
        $this->comis1_id = '';
        $this->Comext1 = '';
        $this->comis2_id = '';
        $this->Comext2 = '';
        $this->comis3_id = '';
        $this->Comext3 = '';
        $this->comis4_id = '';
        $this->Comext4 = '';
        $this->comis5_id = '';
        $this->Comext5 = '';
        $this->ComTot = '';
        $this->ComFin = '';
    }
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
