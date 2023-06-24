<?php

namespace App\Http\Livewire\Metodo;

use App\Models\MetodoPago;
use Livewire\Component;

class Rmetodo extends Component
{
    public $N,$CLV;
    public function render()
    {
        return view('livewire.metodo.rmetodo');
    }
    public function registrar(){
        MetodoPago::updateOrCreate([
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
        return redirect()->route('Metodos');
    }
}
