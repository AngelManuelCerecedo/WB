<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use App\Models\Movimientos;
use Livewire\Component;
use Livewire\WithPagination;

class Bcliente extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;

    public function render()
    {
        $clientes = Cliente::where(function ($query) {
            $query->where('NOMBRE', 'like', '%' . $this->search . '%')
                ->orWhere('ALIAS', 'like', '%' . $this->search . '%')
                ->orWhere('RFC', 'like', '%' . $this->search . '%');
        })->paginate($this->cantidad);
        return view('livewire.Cliente.Bcliente', ['clientes' => $clientes]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCantidad()
    {
        $this->resetPage();
    }
}
