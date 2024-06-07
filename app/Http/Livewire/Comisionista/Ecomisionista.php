<?php

namespace App\Http\Livewire\Comisionista;

use App\Models\Comisionista;
use Livewire\Component;

class Ecomisionista extends Component
{
    public $ide,$Nom, $Total;
    public function render()
    {
        return view('livewire.comisionista.ecomisionista');
    }
    public function mount()
    {
        $comisionista = Comisionista::where('id', $this->ide)->first();
        $this->Nom = $comisionista->Nombre;
    }
    public function actualizar()
    {
        Comisionista::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->Nom,
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
        $comisionista = Comisionista::latest()->first();
        return redirect()->route('EComisionista', [$comisionista->id]);
    }
}
