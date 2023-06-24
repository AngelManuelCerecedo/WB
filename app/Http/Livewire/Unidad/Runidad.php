<?php

namespace App\Http\Livewire\Unidad;

use App\Models\UnidadMedida;
use Livewire\Component;

class Runidad extends Component
{
    public $N,$CLV;
    public function render()
    {
        return view('livewire.unidad.runidad');
    }
    public function registrar(){
        UnidadMedida::updateOrCreate([
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
        return redirect()->route('Unidades');
    }
}
