<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Busuario extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $estatus = 'Todos';
    public $aux = true;
    public function render()
    {
        if ($this->estatus == "Todos") {
            $usuarios = User::Where([['name', 'like', '%' . $this->search . '%']])
                ->orWhere([['email', 'like', '%' . $this->search . '%']])
                ->paginate($this->cantidad);
        } else
            $usuarios = User::Where([['name', 'like', '%' . $this->search . '%'], ['estatus', '=', $this->estatus]])
                ->orWhere([['email', 'like', '%' . $this->search . '%'], ['estatus', '=', $this->estatus]])
                ->paginate($this->cantidad);


        return view('livewire.usuarios.busuario', ['usuarios' => $usuarios]);
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
