<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Bcliente extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $clientes = Cliente::Where([['Nombre', 'like', '%' . $this->search . '%']])
            ->orWhere([['ApP', 'like', '%' . $this->search . '%']])
            ->orWhere([['ApM', 'like', '%' . $this->search . '%']])
            ->orWhere([['RFC', 'like', '%' . $this->search . '%']])
            ->orWhere([['NomCom', 'like', '%' . $this->search . '%']])
            ->paginate($this->cantidad);
        return view('livewire.cliente.bcliente', ['clientes' => $clientes]);
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
