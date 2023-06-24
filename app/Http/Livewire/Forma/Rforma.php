<?php

namespace App\Http\Livewire\Forma;

use App\Models\FormaPago;
use Livewire\Component;

class Rforma extends Component
{
    public $N,$CLV;
    public function render()
    {
        return view('livewire.forma.rforma');
    }
    public function registrar(){
        FormaPago::updateOrCreate([
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
        return redirect()->route('Formas');
    }
}
