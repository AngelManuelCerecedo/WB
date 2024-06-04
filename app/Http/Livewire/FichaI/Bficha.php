<?php

namespace App\Http\Livewire\FichaI;

use App\Models\FichaIngreso;
use Livewire\Component;
use Livewire\WithPagination;

class Bficha extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;
    public function render()
    {
        $fichas = FichaIngreso::where(function ($query) {
            $query->where('Folio', 'like', '%' . $this->search . '%');
        })->paginate($this->cantidad);
        return view('livewire.fichai.bficha', ['fichas' => $fichas]);
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

