<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Eempresa extends Component
{
    public $ide, $Nom, $Nc=1, $RFC, $Giro, $B1, $C1, $B2, $C2, $B3, $C3, $B4, $C4, $B5, $C5;
    public function render()
    {
        return view('livewire.empresa.eempresa');
    }
    public function mount()
    {
        $empresa = Empresa::where('id', $this->ide)->first();
        $this->Nom = $empresa->Nombre;
        $this->Nc = $empresa->NCorto;
        $this->RFC = $empresa->RFC;
        $this->Giro = $empresa->Giro;
        $this->B1 = $empresa->B1;
        $this->C1 = $empresa->C1;
        $this->B2 = $empresa->B2;
        $this->C2 = $empresa->C2;
        $this->B3 = $empresa->B3;
        $this->C3 = $empresa->C3;
        $this->B4 = $empresa->B4;
        $this->C4 = $empresa->C4;
        $this->B5 = $empresa->B5;
        $this->C5 = $empresa->C5;
    }
    public function actualizar()
    {
        empresa::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->Nom,
                'NCorto' => $this->Nc,
                'RFC' => $this->RFC,
                'Giro' => $this->Giro,
                'B1' => $this->B1,
                'C1' => $this->C1,
                'B2' => $this->B2,
                'C2' => $this->C2,
                'B3' => $this->B3,
                'C3' => $this->C3,
                'B4' => $this->B4,
                'C4' => $this->C4,
                'B5' => $this->B5,
                'C5' => $this->C5,
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
        return redirect()->route('Empresas');
    }
}
