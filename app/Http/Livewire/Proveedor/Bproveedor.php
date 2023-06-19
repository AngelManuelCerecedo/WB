<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Bproveedor extends Component
{
    use WithPagination;
    public $search;
    public $message;
    public $cantidad = 20;
    public $estatus = 'Todos';
    public function render()
    {
        if ($this->estatus == "Todos") {
            $proveedores = Proveedor::Where([['Nombre', 'like', '%' . $this->search . '%']])
                ->orWhere([['ApP', 'like', '%' . $this->search . '%']])
                ->orWhere([['ApM', 'like', '%' . $this->search . '%']])
                ->orWhere([['RFC', 'like', '%' . $this->search . '%']])
                ->orWhere([['NEMP', 'like', '%' . $this->search . '%']])
                ->paginate($this->cantidad);
        } else 
            $proveedores = Proveedor::Where([['Nombre', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['ApP', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['ApM', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['RFC', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['NEMP', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->paginate($this->cantidad);

        return view('livewire.proveedor.bproveedor', ['proveedores' => $proveedores]);
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
