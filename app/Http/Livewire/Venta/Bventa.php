<?php

namespace App\Http\Livewire\Venta;

use App\Models\Sucursal;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class Bventa extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public $Sucursal;
    public function render()
    {
        $Sucursal = Sucursal::all();
        if ($this->Sucursal) {
            $Ventas = Venta::Where([['Folio', 'like', '%' . $this->search . '%'],['sucursal_id', $this->Sucursal]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        } else {
            $Ventas = Venta::Where([['Folio', 'like', '%' . $this->search . '%']])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        }
        return view('livewire.venta.bventa',['ventas'=>$Ventas, 'Sucursales'=>$Sucursal]);
    }
}
