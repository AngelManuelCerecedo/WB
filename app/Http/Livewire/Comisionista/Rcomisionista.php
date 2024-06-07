<?php

namespace App\Http\Livewire\Comisionista;

use App\Models\Comisionista;
use Livewire\Component;

class Rcomisionista extends Component
{
    public $Nom, $Total;
    public function render()
    {
        return view('livewire.comisionista.rcomisionista');
    }
    public function registrar(){
        Comisionista::updateOrCreate(
            [
                'Nombre' => $this->Nom,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Comisionistas');
    }
}
