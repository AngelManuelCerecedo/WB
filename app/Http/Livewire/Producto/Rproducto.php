<?php

namespace App\Http\Livewire\Producto;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\UnidadMedida;
use Livewire\Component;

class Rproducto extends Component
{
    public $CB, $NOM, $SMN, $SMX, $P, $P1, $P2, $P3, $C1, $C2, $C3, $C4, $AUXM, $AUXC, $AUXU, $AUXP, $IVA, $EST,
           $c1, $c2, $c3, $c4, $c5, $c6;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        $PROVEEDOR = Proveedor::all();
        return view('livewire.Producto.Rproducto', ['cat' => $CAT, 'unidades' => $UNIDAD, 'marcas' => $MARCA, 'provs' => $PROVEEDOR]);
    }
    public function registrar()
    {
        Producto::updateOrCreate([
            'Nombre' => $this->NOM,
            'CodigoB' => $this->CB,
            'StockMin' => $this->SMN,
            'StockMax' => $this->SMX,
            'Precio' => $this->P,
            'Clv1' => $this->C1,
            'Clv2' => $this->C2,
            'Clv3' => $this->C3,
            'Clv4' => $this->C4,
            //ALMACEN
            'A1' => $this->c1,
            'A2' => $this->c2,
            'A3' => $this->c3,
            'A4' => $this->c4,
            'A5' => $this->c5,
            'A6' => $this->c6,
            'A7' => 7,
            'marca_id' => $this->AUXM,
            'categoria_id' => $this->AUXC,
            'unidad_id' => $this->AUXU,
            'proveedor_id' => $this->AUXP,
            'IVA' => $this->IVA,
            'Estatus' => $this->EST,
        ]);
        $producto = Producto::Where('CodigoB', '=', $this->CB)->first();
        if ($this->c1) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c1,
                'producto_id' => $producto->id,
            ]);
        }
        if ($this->c2) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c2,
                'producto_id' => $producto->id,
            ]);
        }
        if ($this->c3) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c3,
                'producto_id' => $producto->id,
            ]);
        }
        if ($this->c4) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c4,
                'producto_id' => $producto->id,
            ]);
        }
        if ($this->c5) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c5,
                'producto_id' => $producto->id,
            ]);
        }
        if ($this->c6) {
            Almacen_Producto::updateOrCreate([
                'almacen_id' => $this->c6,
                'producto_id' => $producto->id,
            ]);
        }
        Almacen_Producto::updateOrCreate([
            'almacen_id' => 7,
            'producto_id' => $producto->id,
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
