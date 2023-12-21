<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;

class Bempleado extends Component
{
    use WithPagination;
    public $search;
    public $message;
    public $cantidad = 20;
    public $estatus = 'Todos';
    public $aux = true;
    public function render()
    {
        if ($this->estatus == "Todos") {
            $empleados = Empleado::Where([['Nombre', 'like', '%' . $this->search . '%']])
                ->orWhere([['ApP', 'like', '%' . $this->search . '%']])
                ->orWhere([['ApM', 'like', '%' . $this->search . '%']])
                ->paginate($this->cantidad);
        } else 
            $empleados = Empleado::Where([['Nombre', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['ApP', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
                ->orWhere([['ApM', 'like', '%' . $this->search . '%'], ['Estatus', '=', $this->estatus]])
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
