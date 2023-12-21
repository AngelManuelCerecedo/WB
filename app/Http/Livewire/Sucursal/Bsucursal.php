<?php

namespace App\Http\Livewire\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class Bsucursal extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $sucursales = Sucursal::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.Sucursal.Bsucursal',['sucursales'=>$sucursales]);
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
