<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;

class Rmarca extends Component
{
    public $N,$CLV;
    public function render()
    {
        return view('livewire.marca.rmarca');
    }
    public function registrar(){
        Marca::updateOrCreate([
            'Clave' => $this->CLV,
            'Nombre' => $this->N,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Marcas');
    }
}
