<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Rempresa extends Component
{
    public $ide, $Nom, $Nc, $RFC, $Giro, $B1, $C1, $B2, $C2, $B3, $C3, $B4, $C4, $B5, $C5;
    public function render()
    {
        return view('livewire.empresa.rempresa');
    }
    public function registrar(){
        Empresa::updateOrCreate(
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
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->limpiar();
        $this->redic();
    }
    public function limpiar()
    {
        $this->Nom = '';
        $this->Nc = '';
        $this->RFC = '';
        $this->Giro = '';
        $this->B1 = '';
        $this->C1 = '';
        $this->B2 = '';
        $this->C2 = '';
        $this->B3 = '';
        $this->C3 = '';
        $this->B4 = '';
        $this->C4 = '';
        $this->B5 = '';
        $this->C5 = '';
    }
    public function redic()
    {
        return redirect()->route('Empresas');
    }
}
