<?php

namespace App\Http\Livewire\Producto;

use App\Models\Marca;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Bproducto extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public $Sstock, $marca;
    public function render()
    {
        $marcas = Marca::all();
        if ($this->marca) {
            $productos = Producto::Where([['Nombre', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->orWhere([['CodigoB', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->orWhere([['Clv1', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->orWhere([['Clv2', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->orWhere([['Clv3', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->orWhere([['Clv4', 'like', '%' . $this->search . '%'],['marca_id', $this->marca]])
            ->paginate($this->cantidad);
        } else {
            $productos = Producto::Where([['Nombre', 'like', '%' . $this->search . '%']])
            ->orWhere([['CodigoB', 'like', '%' . $this->search . '%']])
            ->orWhere([['Clv1', 'like', '%' . $this->search . '%']])
            ->orWhere([['Clv2', 'like', '%' . $this->search . '%']])
            ->orWhere([['Clv3', 'like', '%' . $this->search . '%']])
            ->orWhere([['Clv4', 'like', '%' . $this->search . '%']])
            ->paginate($this->cantidad);
        }
        return view('livewire.Producto.Bproducto', ['productos'=>$productos, 'Marcas'=>$marcas]);
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
