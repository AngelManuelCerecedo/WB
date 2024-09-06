<?php

namespace App\Http\Livewire\Factura;

use App\Models\Factura;
use Livewire\Component;
use Livewire\WithPagination;

class Bfactura2 extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public function render()
    {
        $facturas = Factura::where('Folio', 'like', '%' . $this->search . '%')
            ->whereNotNull('empresaD_id')
            ->paginate($this->cantidad);
        return view('livewire.factura.bfactura2', ['facturas' => $facturas]);
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
