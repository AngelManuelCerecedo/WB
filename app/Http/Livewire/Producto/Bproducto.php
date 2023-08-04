<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Bproducto extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $productos = Producto::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->orWhere([['CodigoB', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave1', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave2', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave3', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave4', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.producto.bproducto', ['productos'=>$productos]);
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
