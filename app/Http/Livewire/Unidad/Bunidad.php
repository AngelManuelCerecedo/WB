<?php

namespace App\Http\Livewire\Unidad;

use App\Models\UnidadMedida;
use Livewire\Component;
use Livewire\WithPagination;

class Bunidad extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $unidades = UnidadMedida::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.unidad.bunidad',['unidades'=>$unidades]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingEstatus()
    {
        $this->resetPage();
    }
    public function updatingCantidad()
    {
        $this->resetPage();
    }
}
