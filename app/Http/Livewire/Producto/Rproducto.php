<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Livewire\Component;

class Rproducto extends Component
{
    public $CB,$NOM,$SMN,$SMX,$P,$P1,$P2,$P3,$C1,$C2,$C3,$C4,$AUXM,$AUXC,$AUXU,$IVA,$EST;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        return view('livewire.producto.rproducto',['cat'=>$CAT,'unidades'=>$UNIDAD,'marcas'=>$MARCA]);
    }
    public function registrar(){
        Producto::updateOrCreate([
            'CodigoB' => $this->CB,
            'Nombre'=> $this->NOM,
            'StockMin' => $this->SMN,
            'StockMax' => $this->SMX,
            'Precio' => $this->P,
            'Precio1'=> $this->P1,
            'Precio2'=> $this->P2,
            'Precio3'=> $this->P3,
            'Clave1' => $this->C1,
            'Clave2' => $this->C2,
            'Clave3' => $this->C3,
            'Clave4' => $this->C4,
            'marca_id' => $this->AUXM,
            'categoria_id'=> $this->AUXC,
            'unidad_id'=> $this->AUXU,
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
