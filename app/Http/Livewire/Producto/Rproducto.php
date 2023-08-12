<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\UnidadMedida;
use Livewire\Component;

class Rproducto extends Component
{
    public $CB,$NOM,$SMN,$SMX,$P,$P1,$P2,$P3,$C1,$C2,$C3,$C4,$AUXM,$AUXC,$AUXU,$AUXP,$IVA,$EST;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        $PROVEEDOR = Proveedor::all();
        return view('livewire.producto.rproducto',['cat'=>$CAT,'unidades'=>$UNIDAD,'marcas'=>$MARCA, 'provs'=>$PROVEEDOR]);
    }
    public function registrar(){
        Producto::updateOrCreate([
            'Nombre'=> $this->NOM,
            'CodigoB' => $this->CB,
            'StockMin' => $this->SMN,
            'StockMax' => $this->SMX,
            'Precio' => $this->P,
            'Clv1' => $this->C1,
            'Clv2' => $this->C2,
            'Clv3' => $this->C3,
            'Clv4' => $this->C4,
            'marca_id' => $this->AUXM,
            'categoria_id'=> $this->AUXC,
            'unidad_id'=> $this->AUXU,
            'proveedor_id' => $this->AUXP,
            'IVA' => $this->IVA,
            'Estatus' => $this->EST,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Productos');
    }
}
