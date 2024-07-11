<?php

namespace App\Http\Livewire\Comisionista;

use App\Models\Comisionista;
use Livewire\Component;
use Livewire\WithPagination;

class Bcomisionista extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;
    public function render()
    {
        $comisionistas = Comisionista::where(function ($query) {
            $query->where('Nombre', 'like', '%' . $this->search . '%');
        })->paginate($this->cantidad);
        return view('livewire.Comisionista.Bcomisionista', ['comisionistas' => $comisionistas]);
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
