<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class Ecategoria extends Component
{
    public $N,$CLV,$ide;
    public function render()
    {
        return view('livewire.Categoria.Ecategoria');
    }
    public function mount(){
        $cat = Categoria::where('id', $this->ide)->first();
        $this->N = $cat->Nombre;
        $this->CLV = $cat->Clave;
    }
    public function actualizar()
    {
        Categoria::updateOrCreate(
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
        return redirect()->route('Categorias');
    }
}
