<?php

namespace App\Http\Livewire\Metodo;

use App\Models\MetodoPago;
use Livewire\Component;

class Emetodo extends Component
{
    public $N,$CLV,$ide;
    public function render()
    {
        return view('livewire.Metodo.Emetodo');
    }
    public function mount(){
        $cat = MetodoPago::where('id', $this->ide)->first();
        $this->N = $cat->Nombre;
        $this->CLV = $cat->Clave;
    }
    public function actualizar()
    {
        MetodoPago::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->N,
                'Clave' => $this->CLV,
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
        return redirect()->route('Metodos');
    }
}
