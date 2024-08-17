<?php

namespace App\Http\Livewire\Factura;

use App\Models\Factura;
use Livewire\Component;
use Livewire\WithPagination;

class Bfactura extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $facturas = Factura::Where('Folio', 'like', '%' . $this->search . '%')
            ->paginate($this->cantidad);
        return view('livewire.factura.bfactura', ['facturas' => $facturas]);
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
