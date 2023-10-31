<?php

namespace App\Http\Livewire\Traspaso;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Lote;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Traspaso;
use Livewire\Component;

class Etraspaso extends Component
{
    public $SO, $SD, $prod, $EmpO, $CD, $Cant, $Estatus, $EmpD, $Folio = 'TRP', $Obs;
    public $IdSuc, $FConse, $Productos, $search, $ListaAux, $idaux = 0;
    public $modalAP = false, $ListaFT, $ide;
    public function render()
    {
        $Sucursales = Sucursal::all();
        $this->ListaFT =  Traspaso::Where([['Folio', '=', $this->Folio], ['producto_id', '!=', 'NULL']])->get();
        if ($this->search) {
            $CantDisp = Almacen_Producto::Where([['producto_id', $this->search], ['almacen_id', $this->SO]])->first();
            $this->CD = $CantDisp->Stock;
        }
        return view('livewire.traspaso.etraspaso', ['Sucursales' => $Sucursales]);
    }
    public function mount()
    {
        $Traspaso = Traspaso::Where('id', $this->ide)->first();
        $this->Folio = $Traspaso->Folio;
        $this->Estatus = $Traspaso->Estatus;
        $this->SO = $Traspaso->almacenO_id;
        $this->SD = $Traspaso->almacenD_id;
        $this->Obs = $Traspaso->Obs;
        $this->Productos = Almacen_Producto::Where([['almacen_id', $this->SO], ['Stock', '!=', 'null']])->get();
    }
    public function agregarA()
    {
        $PeL = Traspaso::Where([['producto_id', $this->search], ['Folio', $this->Folio]])->first();
        $AuxProducto = Producto::Where([['id', $this->search]])->first();
        $PS = Almacen_Producto::Where([['almacen_id', $this->SD], ['producto_id', $this->search]])->first();
        if ($PS) {
            if (!$PeL) {
                if ($this->Cant) {
                    $Traspaso = Traspaso::Where('id', $this->ide)->first();
                    $Producto = Almacen_Producto::Where([['producto_id', '=', $this->search], ['almacen_id', '=', $this->SO]])->first();
                    if (($AuxProducto->StockMin <= ($Producto->Stock - $this->Cant)) || $this->SO == '7') {
                        if ($Producto) {
                            if ($Producto->Stock > 0 && $Producto->Stock >= $this->Cant) {
                                Traspaso::updateOrCreate(
                                    [
                                        'Folio' => $this->Folio,
                                        'Aux' => $Traspaso->Aux,
                                        'almacenO_id' => $this->SO,
                                        'almacenD_id' => $this->SD,
                                        'producto_id' => $this->search,
                                        'Cantidad' => $this->Cant
                                    ]
                                );
                            } else {
                                $this->dispatchBrowserEvent('swal', [
                                    'title' => 'Producto  Sin Stock',
                                    'type' => 'error'
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('swal', [
                            'title' => 'Stock Minimo',
                            'type' => 'error'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Agrega la Cantidad',
                        'type' => 'error'
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Producto Ya Registrado',
                    'type' => 'error'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Este Producto no esta Registrado en el Almacen de la Sucursal Destio',
                'type' => 'warning'
            ]);
        }
    }
    public function eliminarP($id)
    {
        Traspaso::findOrFail($id)->delete();
    }
    public function registrar()
    {
        Traspaso::updateOrCreate(
            ['Folio' => $this->Folio],
            [
                'Estatus' => 'Iniciado'
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Traspaso Iniciado',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function terminar()
    {
        $Productos = Traspaso::Where([['Folio', $this->Folio], ['producto_id', '!=', null]])->get();
        foreach ($Productos as $Producto) {
            $aux = $Producto->Cantidad;
            $PS = Almacen_Producto::Where([['almacen_id', $this->SD], ['producto_id', $Producto->producto_id]])->first();
            $PR = Almacen_Producto::Where([['almacen_id', $this->SO], ['producto_id', $Producto->producto_id]])->first();
            $Lotes = Lote::Where([['producto_id', $Producto->producto_id], ['almacen_id', $this->SO]])->get();
            foreach ($Lotes as $Lote) {
                $CantL = $Lote->Cantidad;
                if ($CantL == $aux  && $Lote->almacen_id == $this->SO) {
                    Lote::updateOrCreate(
                        ['id' => $Lote->id],
                        [
                            'almacen_id' => $this->SD,
                        ]
                    );
                    break;
                }
                if ($CantL < $aux && $Lote->almacen_id == $this->SO) {
                    Lote::updateOrCreate(
                        ['id' => $Lote->id],
                        [
                            'almacen_id' => $this->SD,
                        ]
                    );
                }
                if ($CantL > $aux && $Lote->almacen_id == $this->SO) {
                    Lote::updateOrCreate(
                        [
                            'Numero' => $Lote->Numero,
                            'Fecha' => $Lote->Fecha,
                            'Cantidad' => $aux,
                            'producto_id' => $Lote->producto_id,
                            'compra_id' => $Lote->compra_id,
                            'almacen_id' => $this->SD,
                        ]
                    );
                    Lote::updateOrCreate(
                        ['id' => $Lote->id],
                        [
                            'Cantidad' => $Lote->Cantidad - $aux,
                        ]
                    );
                    break;
                }
                $aux -= $CantL;
            }
            Almacen_Producto::updateOrCreate(
                ['id' => $PS->id],
                [
                    'Stock' => $PS->Stock + $Producto->Cantidad
                ]
            );
            Almacen_Producto::updateOrCreate(
                ['id' => $PR->id],
                [
                    'Stock' => $PR->Stock - $Producto->Cantidad
                ]
            );
        }
        Traspaso::updateOrCreate(
            ['Folio' => $this->Folio],
            [
                'Estatus' => 'Terminado'
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Traspaso Terminado',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Traspasos');
    }
}
