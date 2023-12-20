<?php

namespace App\Http\Livewire\Venta;

use App\Models\Venta;
use App\Models\Venta_Producto;
use Livewire\Component;

class Eventa extends Component
{
    public $Folio, $Empleado, $Sucursal, $FP, $Fecha, $ListaFT, $Total, $TArt, $ide,$venta;
    public function render()
    {
        return view('livewire.Venta.Eventa');
    }
    public function mount()
    {
        $this->venta = Venta::where('id', $this->ide)->first();
        $this->ListaFT = Venta_Producto::where('venta_id',$this->ide)->get();
        $this->Folio = $this->venta->Folio;
        $this->Empleado = $this->venta->empleado;
        $this->Sucursal = $this->venta->sucursal->Nombre;
        $this->FP = $this->venta->forma->Nombre;
        $this->Fecha = $this->venta->created_at;
    }
}
