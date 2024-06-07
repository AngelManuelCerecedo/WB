<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Comisionista;
use Livewire\Component;

class Ecliente extends Component
{
    public $ide, $Nom, $RS, $RFC, $CP, $DomF, $Reg, $CDFI, $Comext1, $comis1_id, $Comext2, $comis2_id, $Comext3, $comis3_id, $Comext4, $comis4_id, $Comext5, $comis5_id, $ComTot, $COMFINTECH;
    public $Comisionistas;
    public function render()
    {
        return view('livewire.Cliente.Ecliente');
    }
    public function mount($ide)
    {
        $this->Comisionistas = Comisionista::all();
        $cliente = Cliente::where('id', $ide)->first();
        $this->Nom = $cliente->NOMBRE;
        $this->RS = $cliente->ALIAS;
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
    }
    public function actualizar()
    {
        $this->comis1_id = ($this->comis1_id == 'NULL') ? null : $this->comis1_id ;
        $this->comis2_id = ($this->comis2_id == 'NULL') ? null : $this->comis2_id ;
        $this->comis3_id = ($this->comis3_id == 'NULL') ? null : $this->comis3_id ;
        $this->comis4_id = ($this->comis4_id == 'NULL') ? null : $this->comis4_id ;
        $this->comis5_id = ($this->comis5_id == 'NULL') ? null : $this->comis5_id ;
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
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
