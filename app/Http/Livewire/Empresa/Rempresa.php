<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Rempresa extends Component
{
    public $ide, $Nom, $Nc, $RFC, $Giro;
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
    }
    public function redic()
    {
        $Empresa = Empresa::latest()->first();
        return redirect()->route('EEmpresa', [$Empresa->id]);
    }
}
