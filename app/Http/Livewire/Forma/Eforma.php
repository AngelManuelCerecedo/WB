<?php

namespace App\Http\Livewire\Forma;

use App\Models\FormaPago;
use Livewire\Component;

class Eforma extends Component
{
    public $N,$CLV,$ide;
    public function render()
    {
        return view('livewire.forma.eforma');
    }
    public function mount(){
        $cat = FormaPago::where('id', $this->ide)->first();
        $this->N = $cat->Nombre;
        $this->CLV = $cat->Clave;
    }
    public function actualizar()
    {
        FormaPago::updateOrCreate(
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
        return redirect()->route('Formas');
    }
}
