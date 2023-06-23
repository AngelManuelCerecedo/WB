<?php

namespace App\Http\Livewire\Metodo;

use App\Models\MetodoPago;
use Livewire\Component;
use Livewire\WithPagination;

class Bmetodo extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $metodos = MetodoPago::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.metodo.bmetodo',['metodos'=>$metodos]);
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
