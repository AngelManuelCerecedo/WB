<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;

class Emarca extends Component
{
    public $N,$CLV,$ide;
    public function render()
    {
        return view('livewire.marca.emarca');
    }
    public function mount(){
        $cat = Marca::where('id', $this->ide)->first();
        $this->N = $cat->Nombre;
        $this->CLV = $cat->Clave;
    }
    public function actualizar()
    {
        Marca::updateOrCreate(
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
        return redirect()->route('Marcas');
    }
}
