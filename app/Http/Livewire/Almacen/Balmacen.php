<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Almacen;
use Livewire\Component;
use Livewire\WithPagination;

class Balmacen extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $almacenes = Almacen::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.almacen.balmacen',['almacenes'=>$almacenes]);
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
