<?php

namespace App\Http\Livewire\Producto;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\UnidadMedida;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class Eproducto extends Component
{
    public $ide, $CB, $NOM, $SMN, $SMX, $P, $P1, $P2, $P3, $P4, $P5, $P6, $P7, $P8, $P9, $P10, $C1, $C2, $C3, $C4, $AUXM, $AUXC, $AUXU, $AUXP, $IVA, $EST;
    public $I1, $I2, $I3, $I4, $I5, $I6, $I7, $I8, $I9, $I10;
    public $IA1, $IA2, $IA3, $IA4, $IA5, $IA6, $IA7, $IA8, $IA9, $IA10;
    public $A1, $A2, $A3, $A4, $A5, $A6, $A7, $A8, $A9, $A10, $c1, $c2, $c3, $c4, $c5, $c6;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        $PROVEEDOR = Proveedor::all();
        return view('livewire.producto.eproducto', ['cat' => $CAT, 'unidades' => $UNIDAD, 'marcas' => $MARCA, 'provs' => $PROVEEDOR]);
    }
    public function mount()
    {
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
        $this->c1 = $prod->A1;
        $this->c2 = $prod->A2;
        $this->c3 = $prod->A3;
        $this->c4 = $prod->A4;
        $this->c5 = $prod->A5;
        $this->c6 = $prod->A6;
        $this->IVA = $prod->IVA;
        $this->EST = $prod->Estatus;
        $this->AUXM = $prod->marca_id;
        $this->AUXC = $prod->categoria_id;
        $this->AUXU = $prod->unidad_id;
        $this->AUXP = $prod->proveedor_id;
        if ($this->P1) {
            $this->CPV(1);
        }
        if ($this->P2) {
            $this->CPV(2);
        }
        if ($this->P3) {
            $this->CPV(3);
        }
        if ($this->P4) {
            $this->CPV(4);
        }
        if ($this->P5) {
            $this->CPV(5);
        }
        if ($this->P6) {
            $this->CPV(6);
        }
        if ($this->P7) {
            $this->CPV(7);
        }
    }
    public function GP()
    {
        Producto::updateOrCreate(
            ['id' => $this->ide],
            [
                'P1' => $this->P1,
                'P2' => $this->P2,
                'P3' => $this->P3,
                'P4' => $this->P4,
                'P5' => $this->P5,
                'P6' => $this->P6,
                'P7' => $this->P7,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Precios Actualizados Exitosamente',
            'type' => 'success'
        ]);
    }
    public function actualizar()
    {
        if ($this->c1 == 0) {
            $this->c1 = null;
        }
        if ($this->c2 == 0) {
            $this->c2 = null;
        }
        if ($this->c3 == 0) {
            $this->c3 = null;
        }
        if ($this->c4 == 0) {
            $this->c4 = null;
        }
        if ($this->c5 == 0) {
            $this->c5 = null;
        }
        if ($this->c6 == 0) {
            $this->c6 = null;
        }
        Producto::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->NOM,
                'CodigoB' => $this->CB,
                'StockMin' => $this->SMN,
                'StockMax' => $this->SMX,
                'Precio' => $this->P,
                'Clv1' => $this->C1,
                'Clv2' => $this->C2,
                'Clv3'  => $this->C3,
                'Clv4' => $this->C4,
                'A1' => $this->c1,
                'A2' => $this->c2,
                'A3' => $this->c3,
                'A4' => $this->c4,
                'A5' => $this->c5,
                'A6' => $this->c6,
                'IVA' => $this->IVA,
                'Estatus' => $this->EST,
                'marca_id' => $this->AUXM,
                'categoria_id' => $this->AUXC,
                'unidad_id' => $this->AUXU,
                'proveedor_id' => $this->AUXP,
            ]
        );
        if ($this->c1) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide,'almacen_id' => $this->c1],
                [
                    'almacen_id' => $this->c1,
                    'producto_id' => $this->ide,
                ]
            );
        }
        if ($this->c2) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide, 'almacen_id' => $this->c2],
                [
                    'almacen_id' => $this->c2,
                    'producto_id' => $this->ide,
                ]
            );
        }
        if ($this->c3) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide , 'almacen_id' => $this->c3],
                [
                    'almacen_id' => $this->c3,
                    'producto_id' => $this->ide,
                ]
            );
        }
        if ($this->c4) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide , 'almacen_id' => $this->c4],
                [
                    'almacen_id' => $this->c4,
                    'producto_id' => $this->ide,
                ]
            );
        }
        if ($this->c5) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide , 'almacen_id' => $this->c5],
                [
                    'almacen_id' => $this->c5,
                    'producto_id' => $this->ide,
                ]
            );
        }
        if ($this->c6) {
            Almacen_Producto::updateOrCreate(
                ['producto_id' => $this->ide , 'almacen_id' => $this->c6],
                [
                    'almacen_id' => $this->c6,
                    'producto_id' => $this->ide,
                ]
            );
        }
        Almacen_Producto::updateOrCreate([
            'almacen_id' => 7,
            'producto_id' => $this->ide,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Datos Actualizados Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }

    public function CPP($AUX)
    {
        switch ($AUX) {
            case '1':
                $I = $this->I1 / 100;
                $TI = $I * $this->P;
                $this->P1 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA1 =  bcdiv(($this->P1 - $this->P), '1', 2);
                break;
            case '2':
                $I = $this->I2 / 100;
                $TI = $I * $this->P;
                $this->P2 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA2 =  bcdiv(($this->P2 - $this->P), '1', 2);
                break;
            case '3':
                $I = $this->I3 / 100;
                $TI = $I * $this->P;
                $this->P3 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA3 =  bcdiv(($this->P3 - $this->P), '1', 2);
                break;
            case '4':
                $I = $this->I4 / 100;
                $TI = $I * $this->P;
                $this->P4 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA4 =  bcdiv(($this->P4 - $this->P), '1', 2);
                break;
            case '5':
                $I = $this->I5 / 100;
                $TI = $I * $this->P;
                $this->P5 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA5 =  bcdiv(($this->P5 - $this->P), '1', 2);
                break;
            case '6':
                $I = $this->I6 / 100;
                $TI = $I * $this->P;
                $this->P6 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA6 =  bcdiv(($this->P6 - $this->P), '1', 2);
                break;
            case '7':
                $I = $this->I7 / 100;
                $TI = $I * $this->P;
                $this->P7 = bcdiv(($TI + $this->P), '1', 2);
                $this->IA7 =  bcdiv(($this->P7 - $this->P), '1', 2);
                break;
        }
    }

    public function CIA($AUX)
    {
        switch ($AUX) {
            case '1':
                $I = $this->IA1;
                $TI = ($I / $this->P) * 100;
                $this->I1 = bcdiv(($TI), '1', 2);
                $this->P1  = bcdiv(($I + $this->P), '1', 2);
                break;
            case '2':
                $I = $this->IA2;
                $TI = ($I / $this->P) * 100;
                $this->I2 = bcdiv(($TI), '1', 2);
                $this->P2  = bcdiv(($I + $this->P), '1', 2);
                break;
            case '3':
                $I = $this->IA3;
                $TI = ($I / $this->P) * 100;
                $this->I3 = bcdiv(($TI), '1', 2);
                $this->P3 = bcdiv(($I + $this->P), '1', 2);
                break;
            case '4':
                $I = $this->IA4;
                $TI = ($I / $this->P) * 100;
                $this->I4 = bcdiv(($TI), '1', 2);
                $this->P4  = bcdiv(($I + $this->P), '1', 2);
                break;
            case '5':
                $I = $this->IA5;
                $TI = ($I / $this->P) * 100;
                $this->I5 = bcdiv(($TI), '1', 2);
                $this->P5  = bcdiv(($I + $this->P), '1', 2);
                break;
            case '6':
                $I = $this->IA6;
                $TI = ($I / $this->P) * 100;
                $this->I6 = bcdiv(($TI), '1', 2);
                $this->P6  = bcdiv(($I + $this->P), '1', 2);
                break;
            case '7':
                $I = $this->IA7;
                $TI = ($I / $this->P) * 100;
                $this->I7 = bcdiv(($TI), '1', 2);
                $this->P7  = bcdiv(($I + $this->P), '1', 2);
                break;
        }
    }
    public function CPV($AUX)
    {
        switch ($AUX) {
            case '1':
                $I = $this->P1 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I1 = bcdiv(($TI), '1', 2);
                $this->IA1  = bcdiv(($I), '1', 2);
                break;
            case '2':
                $I = $this->P2 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I2 = bcdiv(($TI), '1', 2);
                $this->IA2  = bcdiv(($I), '1', 2);
                break;
            case '3':
                $I = $this->P3 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I3 = bcdiv(($TI), '1', 2);
                $this->IA3 = bcdiv(($I), '1', 2);
                break;
            case '4':
                $I = $this->P4 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I4 = bcdiv(($TI), '1', 2);
                $this->IA4  = bcdiv(($I), '1', 2);
                break;
            case '5':
                $I = $this->P5 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I5 = bcdiv(($TI), '1', 2);
                $this->IA5  = bcdiv(($I), '1', 2);
                break;
            case '6':
                $I = $this->P6 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I6 = bcdiv(($TI), '1', 2);
                $this->IA6  = bcdiv(($I), '1', 2);
                break;
            case '7':
                $I = $this->P7 - $this->P;
                $TI = ($I / $this->P) * 100;
                $this->I7 = bcdiv(($TI), '1', 2);
                $this->IA7  = bcdiv(($I), '1', 2);
                break;
        }
    }
    public function redic()
    {
        return redirect()->route('Productos');
    }
}
