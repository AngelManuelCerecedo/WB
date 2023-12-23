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
        $venta = Venta::where('id', $this->ide)->get();
        return view('livewire.Venta.Eventa',['venta'=>$venta]);
    }
    public function mount()
    {
        $venta = Venta::where('id', $this->ide)->first();
        $this->ListaFT = Venta_Producto::where('venta_id',$this->ide)->get();
        $this->Folio = $venta->Folio;
        $this->Empleado = $venta->empleado->Nombre;
        $this->Sucursal = $venta->sucursal->Nombre;
        $this->FP = $venta->forma->Nombre;
        $this->Fecha = $venta->created_at;
    }
}
