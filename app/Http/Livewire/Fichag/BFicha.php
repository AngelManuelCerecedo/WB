<?php

namespace App\Http\Livewire\Fichag;

use App\Models\FichaGasto;
use Livewire\Component;
use Livewire\WithPagination;

class BFicha extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;
    public function render()
    {
        $fichas = FichaGasto::where(function ($query) {
        $query->where('Folio', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc')  // Ordena por 'id' en orden ascendente
        ->paginate($this->cantidad);
        return view('livewire.Fichag.bficha', ['fichas' => $fichas]);
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
