<?php

namespace App\Http\Livewire\Cotizacion;

use App\Models\Cotizacion;
use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class Bcotizacion extends Component
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
            $Cotizaciones = Cotizacion::Where([['Folio', 'like', '%' . $this->search . '%'],['producto_id',null],['almacen_id', $this->Sucursal]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        } else {
            $Cotizaciones = Cotizacion::Where([['Folio', 'like', '%' . $this->search . '%'],['producto_id',null]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        }
        return view('livewire.Cotizacion.Bcotizacion',['cotizaciones'=>$Cotizaciones, 'Sucursales'=>$Sucursal]);
    }
}
