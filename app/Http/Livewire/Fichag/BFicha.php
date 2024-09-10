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
    public $ModalRPT = false;
    public $Fecha1 = '', $Fecha2 = '';
    public function render()
    {
        $fichas = FichaGasto::where(function ($query) {
        $query->where('Folio', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'desc')  // Ordena por 'id' en orden ascendente
        ->paginate($this->cantidad);
        return view('livewire.Fichag.bficha', ['fichas' => $fichas]);
    }
    public function mount()
    {
        $this->Fecha1 = now()->startOfMonth()->format('Y-m-d');
        $this->Fecha2 = now()->endOfMonth()->format('Y-m-d');
    }
    public function abrirModal()
    {
        $this->ModalRPT = true;
    }
    public function cerrarModal()
    {
        $this->ModalRPT = false;
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
