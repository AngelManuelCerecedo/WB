<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;

class Bempresa extends Component
{
    use WithPagination;
    public $search = '';
    public $cantidad = 20;
    public function render()
    {
        $empresas = Empresa::where(function ($query) {
            $query->where('Nombre', 'like', '%' . $this->search . '%')
                ->orWhere('NCorto', 'like', '%' . $this->search . '%')
                ->orWhere('RFC', 'like', '%' . $this->search . '%');
        })->paginate($this->cantidad);
        return view('livewire.empresa.bempresa', ['empresas' => $empresas]);
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
