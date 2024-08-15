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
            $query->where('Folio', 'like', '%' . $this->search . '%')
                  ->orWhereHas('cliente', function ($q) {
                      $q->where('NOMBRE', 'like', '%' . $this->search . '%')
                      ->orWhere('alias', 'like', '%' . $this->search . '%');
                  });
        })
        ->orderBy('Fecha', 'desc')  // Ordena por 'Fecha' en orden descendente
        ->orderBy('id', 'desc')      // Luego ordena por 'id' en orden descendente
        ->paginate($this->cantidad);
        return view('livewire.Fichai.bficha', ['fichas' => $fichas]);
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

