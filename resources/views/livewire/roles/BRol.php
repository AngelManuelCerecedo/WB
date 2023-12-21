<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class BRol extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;

    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')->paginate($this->cantidad);
        return view('livewire.roles.b-rol', ['roles' => $roles]);
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
