<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\UnidadMedida;
use Livewire\Component;

class Ralmacen extends Component
{
    public $ide, $CB, $NOM, $E, $SMN, $SMX, $P, $P1, $P2, $P3, $P4, $P5, $P6, $P7, $P8, $P9, $P10, $C1, $C2, $C3, $C4, $AUXM, $AUXC, $AUXU, $AUXP, $IVA, $EST;
    public function render()
    {
        $CAT = Categoria::all();
        $UNIDAD = UnidadMedida::all();
        $MARCA = Marca::all();
        $PROVEEDOR = Proveedor::all();
        $ap = Almacen_Producto::where('id', $this->ide)->first();
        $Almacen = Almacen::Where([['id', '=', $ap->almacen_id]])->first();
        return view('livewire.almacen.ralmacen', ['cat' => $CAT, 'unidades' => $UNIDAD, 'marcas' => $MARCA, 'provs' => $PROVEEDOR, 'almacen' => $Almacen]);
    }
    public function mount()
    {
        $ap = Almacen_Producto::where('id', $this->ide)->first();
        $prod = Producto::where('id', $ap->producto_id)->first();
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
        if ($ap->almacen_id == '1') {
            $this->E = $prod->S1;
        }
        if ($ap->almacen_id == '2') {
            $this->E = $prod->S2;
        }
        if ($ap->almacen_id == '3') {
            $this->E = $prod->S4;
        }
        if ($ap->almacen_id == '4') {
            $this->E = $prod->S4;
        }
        if ($ap->almacen_id == '5') {
            $this->E = $prod->S5;
        }
        if ($ap->almacen_id == '6') {
            $this->E = $prod->S6;
        }
        if ($ap->almacen_id == '7') {
            $this->E = $prod->S7;
        }
    }
    public function GE()
    {
        $ap = Almacen_Producto::where('id', $this->ide)->first();
        $prod = Producto::where('id', $ap->producto_id)->first();
        if ($ap->almacen_id == '1') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S1' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '2') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S2' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '3') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S3' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '4') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S4' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '5') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S5' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '6') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S6' => $this->E,
                ]
            );
        }
        if ($ap->almacen_id == '7') {
            Producto::updateOrCreate(
                ['id' => $prod->id],
                [
                    'S7' => $this->E,
                ]
            );
        }
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Datos Actualizados Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        $ap = Almacen_Producto::where('id', $this->ide)->first();
        $almacen = Almacen::Where([['id', '=', $ap->almacen_id]])->first();
        return redirect()->route('EAlmacen', [$almacen->id]);
    }
}
