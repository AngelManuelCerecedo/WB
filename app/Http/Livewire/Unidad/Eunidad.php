<?php

namespace App\Http\Livewire\Unidad;

use App\Models\UnidadMedida;
use Livewire\Component;

class Eunidad extends Component
{
    public $N,$CLV,$ide;
    public function render()
    {
        return view('livewire.Unidad.Eunidad');
    }
    public function mount(){
        $cat = UnidadMedida::where('id', $this->ide)->first();
        $this->N = $cat->Nombre;
        $this->CLV = $cat->Clave;
    }
    public function actualizar()
    {
        UnidadMedida::updateOrCreate(
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
        return redirect()->route('Unidades');
    }
}
