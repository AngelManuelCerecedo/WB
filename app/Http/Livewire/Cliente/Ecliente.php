<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Ecliente extends Component
{
    public $ide, $Nom, $RS, $RFC, $CP, $DomF, $Reg, $CDFI, $Comext1, $Com1, $Comext2, $Com2, $Comext3, $Com3, $Comext4, $Com4, $Comext5, $Com5, $ComTot, $ComFin;
    public function render()
    {
        return view('livewire.Cliente.Ecliente');
    }
    public function mount()
    {
        $cliente = Cliente::where('id', $this->ide)->first();
        $this->Nom = $cliente->NOMBRE;
        $this->RS = $cliente->ALIAS;
        $this->RFC = $cliente->RFC;
        $this->CP = $cliente->CP;
        $this->DomF = $cliente->DOMF;
        $this->Reg = $cliente->REG;
        $this->CDFI = $cliente->CFDI;
        $this->Comext1 = $cliente->COMEXT1;
        $this->Com1 = $cliente->COMISIONISTA1;
        $this->Comext2 = $cliente->COMEXT2;
        $this->Com2 = $cliente->COMISIONISTA2;
        $this->Comext3 = $cliente->COMEXT3;
        $this->Com3 = $cliente->COMISIONISTA3;
        $this->Comext4 = $cliente->COMEXT4;
        $this->Com4 = $cliente->COMISIONISTA4;
        $this->Comext5 = $cliente->COMEXT5;
        $this->Com5 = $cliente->COMISIONISTA5;
        $this->ComTot = $cliente->COMTOT;
        $this->ComFin = $cliente->COMFINTECH;
    }
    public function actualizar()
    {
        Cliente::updateOrCreate(
            ['id' => $this->ide],
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
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
