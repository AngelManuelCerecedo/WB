<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;

class Bmarca extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $marcas = Marca::Where([['Nombre', 'like', '%' . $this->search . '%']])
            ->orWhere([['Clave', 'like', '%' . $this->search . '%']])
            ->paginate($this->cantidad);
        return view('livewire.marca.bmarca', ['marcas' => $marcas]);
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
