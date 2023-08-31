<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Producto;
use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class Ealmacen extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public $ide;
    public function render()
    {
        $Almacen = Almacen::Where([['id', '=', $this->ide]])->first();
        $productos = Producto::Where([['Nombre', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->orWhere([['CodigoB', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->orWhere([['Clv1', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->orWhere([['Clv2', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->orWhere([['Clv3', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->orWhere([['Clv4', 'like', '%' . $this->search . '%'], ['A' . $this->ide, '=', $this->ide]])
            ->paginate($this->cantidad);
        return view('livewire.almacen.ealmacen', ['productos' => $productos, 'almacen' => $Almacen]);
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
    public function existencias($ide)
    {
        $Producto = Almacen_Producto::Where([['producto_id', '=', $ide], ['almacen_id', '=', $this->ide]])->first();
        return redirect()->route('RAlmacen', [$Producto->id]);
    }
}
