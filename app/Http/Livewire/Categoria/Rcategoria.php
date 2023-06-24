<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class Rcategoria extends Component
{
    public $N,$CLV;
    public function render()
    {
        return view('livewire.categoria.rcategoria');
    }
    public function registrar(){
        Categoria::updateOrCreate([
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
        return redirect()->route('Categorias');
    }
}
