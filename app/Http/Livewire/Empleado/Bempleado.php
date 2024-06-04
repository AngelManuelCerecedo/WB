<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;

class Bempleado extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $empleados = Empleado::Where('Nombre', 'like', '%' . $this->search . '%')
            ->paginate($this->cantidad);

        return view('livewire.Empleado.Bempleado', ['empleados' => $empleados]);
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
