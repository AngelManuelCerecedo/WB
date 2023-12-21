<?php

namespace App\Http\Livewire\Forma;

use App\Models\FormaPago;
use Livewire\Component;
use Livewire\WithPagination;

class Bforma extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public function render()
    {
        $formas = FormaPago::Where([['Nombre', 'like', '%' . $this->search . '%']])
        ->orWhere([['Clave', 'like', '%' . $this->search . '%']])
        ->paginate($this->cantidad);
        return view('livewire.Forma.Bforma',['formas'=>$formas]);
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
