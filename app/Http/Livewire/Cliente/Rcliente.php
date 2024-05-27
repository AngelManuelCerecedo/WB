<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Rcliente extends Component
{
    public $ide, $Nom, $RS, $RFC, $CP, $DomF, $Reg, $CDFI, $Comext1, $Com1, $Comext2, $Com2, $Comext3, $Com3, $Comext4, $Com4, $Comext5, $Com5, $ComTot, $ComFin;
    public function render()
    {
        return view('livewire.Cliente.Rcliente');
    }
    public function registrar(){
        Cliente::updateOrCreate(
            [
                'NOMBRE' => $this->Nom,
                'ALIAS' => $this->RS,
                'RFC' => $this->RFC,
                'CP' => $this->CP,
                'DOMF' => $this->DomF,
                'REG' => $this->Reg,
                'CFDI' => $this->CDFI,
                'COMEXT1' => $this->Comext1,
                'COMISIONISTA1' => $this->Com1,
                'COMEXT2' => $this->Comext2,
                'COMISIONISTA2' => $this->Com2,
                'COMEXT3' => $this->Comext3,
                'COMISIONISTA3' => $this->Com3,
                'COMEXT4' => $this->Comext4,
                'COMISIONISTA4' => $this->Com4,
                'COMEXT5' => $this->Comext5,
                'COMISIONISTA5' => $this->Com5,
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
        $this->RS = '';
        $this->RFC = '';
        $this->CP = '';
        $this->DomF = '';
        $this->Reg = '';
        $this->CDFI = '';
        $this->Comext1 = '';
        $this->Com1 = '';
        $this->Comext2 = '';
        $this->Com2 = '';
        $this->Comext3 = '';
        $this->Com3 = '';
        $this->Comext4 = '';
        $this->Com4 = '';
        $this->Comext5 = '';
        $this->Com5 = '';
        $this->ComTot = '';
        $this->ComFin = '';
    }
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
