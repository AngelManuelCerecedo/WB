<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\Beneficiario;
use Livewire\Component;
use Livewire\WithPagination;

class Bbeneficiario extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;
    public function render()
    {
        $beneficiarios = Beneficiario::where(function ($query) {
            $query->where('Nombre', 'like', '%' . $this->search . '%');
        })->paginate($this->cantidad);
        return view('livewire.Beneficiario.bbeneficiario', ['beneficiarios' => $beneficiarios]);
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
