<?php

namespace App\Http\Livewire\Traspaso;

use App\Models\Sucursal;
use App\Models\Traspaso;
use Livewire\Component;
use Livewire\WithPagination;

class Btraspaso extends Component
{
    use WithPagination;
    public $search;
    public $SO;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $Sucursales = Sucursal::all();
        if ($this->SO) {
            $traspasos = Traspaso::Where([['Folio', 'like', '%' . $this->search . '%'],['producto_id',null],['almacenO_id', $this->SO]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        } else {
            $traspasos = Traspaso::Where([['Folio', 'like', '%' . $this->search . '%'],['producto_id',null]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        }
        return view('livewire.traspaso.btraspaso', ['traspasos'=>$traspasos, 'Sucursales'=> $Sucursales]);
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
