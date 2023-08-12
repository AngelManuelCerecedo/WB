<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\UnidadMedida;
use Livewire\Component;

class Eproducto extends Component
{
    public $ide,$CB,$NOM,$SMN,$SMX,$P,$P1,$P2,$P3,$P4,$P5,$P6,$P7,$P8,$P9,$P10,$C1,$C2,$C3,$C4,$AUXM,$AUXC,$AUXU,$AUXP,$IVA,$EST;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        $PROVEEDOR = Proveedor::all();
        return view('livewire.producto.eproducto',['cat'=>$CAT,'unidades'=>$UNIDAD,'marcas'=>$MARCA, 'provs'=>$PROVEEDOR]);
    }
    public function mount(){
        $prod = Producto::where('id', $this->ide)->first();
        $this->NOM = $prod->Nombre;
        $this->CB = $prod->CodigoB;
        $this->SMN = $prod->StockMin;
        $this->SMX = $prod->StockMax;
        $this->P = $prod->Precio;
        $this->P1 = $prod->P1;
        $this->P2 = $prod->P2;
        $this->P3 = $prod->P3;
        $this->P4 = $prod->P4;
        $this->P5 = $prod->P5;
        $this->P6 = $prod->P6;
        $this->P7 = $prod->P7;
        $this->P8 = $prod->P8;
        $this->P9 = $prod->P9;
        $this->P10 = $prod->P10;
        $this->C1 = $prod->Clv1;
        $this->C2 = $prod->Clv2;
        $this->C3 = $prod->Clv3;
        $this->C4 = $prod->Clv4;
        $this->IVA = $prod->IVA;
        $this->EST = $prod->Estatus;
        $this->AUXM = $prod->marca_id;
        $this->AUXC = $prod->categoria_id;
        $this->AUXU = $prod->unidad_id;
        $this->AUXP = $prod->proveedor_id;
    }
}
