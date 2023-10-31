<?php

namespace App\Http\Livewire\Venta;

use App\Models\Almacen_Producto;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\FormaPago;
use App\Models\Lote;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Venta_Producto;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;
use Livewire\Component;

class Puntoventa extends Component
{
    public $Folio, $Estatus = 'Registro', $idaux, $Sucursal = 1, $Productos, $Cant, $search, $Desc = 0, $Promo, $Precio = 0, $ListaFT, $Total = 0;
    public $ModalP = false, $ModalC = false, $ModalCOT = false, $ModalV = false, $ModalCobro = false;
    public $Venta, $CD, $Clientes, $searchCliente, $Cli, $TArt = 0, $Cambio, $searchCot, $Cotizaciones, $searchVent, $Ventas;
    public $PAGO, $FP, $CAMBIO, $FormasP, $ActualizarStock, $Lotes;
    public function render()
    {
        $this->Productos = Almacen_Producto::Where([['almacen_id', 1], ['Stock', '!=', 'null']])->get();
        $this->Clientes = Cliente::all();
        $this->FormasP = FormaPago::all();
        $FolioCon = Venta::Where('sucursal_id', '=', $this->Sucursal)->orderBy('Aux', 'desc')->first();
        if ($FolioCon) {
            $Num = $FolioCon->Aux;
            $this->idaux = $Num + 1;
            $this->Folio = 'VNT0' . $this->Sucursal . $this->idaux; //AGREGAR EL ID DEL USUARIO
            Venta::updateOrCreate(
                ['Folio' => $this->Folio],
                [
                    'Folio' => $this->Folio,
                    'Aux' => $this->idaux,
                    'Importes' => $this->Total,
                ]
            );
        } else {
            $this->idaux = 1;
            $this->Folio = 'VNT0' . $this->Sucursal . $this->idaux; //AGREGAR EL ID DEL USUARIO //FALTAN DATOS 
            Venta::updateOrCreate(
                ['Folio' => $this->Folio],
                [
                    'Folio' => $this->Folio,
                    'Aux' => $this->idaux,
                    'Importes' => $this->Total,
                ]
            );
        }
        //MODAL PRODUCTOS
        if ($this->search) {
            $Prod = Producto::Where('id', $this->search)->first();
            $this->Precio = $Prod->P1;
            $CantDisp = Almacen_Producto::Where([['producto_id', $this->search], ['almacen_id', 1]])->first(); //ALMACEN VARIABLE
            $this->CD = $CantDisp->Stock;
            //$Lote = Lote::Where('producto_id')
        }
        //MODAL CLIENTE
        if ($this->searchCliente) {
            $Cliente = Cliente::Where('id', $this->searchCliente)->first();
            if ($Cliente->TipoP == 'Moral') {
                $this->Cli = $Cliente->NomCom;
            } else {
                $this->Cli = $Cliente->Nombre . ' ' . $Cliente->ApP . ' ' . $Cliente->ApM;
            }
            $this->cerrarModal(2);
        }
        //MODAL COTIZACION
        if ($this->searchCot) {
            //Almacen VARIABLE
            $this->Cotizaciones = Cotizacion::Where([['Folio', 'like', '%' . $this->searchCot . '%'], ['producto_id', null], ['almacen_id', 1]])
                ->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Cotizaciones = Cotizacion::Where([['producto_id', null], ['almacen_id', 1]])->orderBy('id', 'desc')->get();
        }
        //MODAL VENTA
        if ($this->searchVent) {
            //Almacen VARIABLE
            $this->Ventas = Venta::Where([['Folio', 'like', '%' . $this->searchVent . '%'], ['sucursal_id', 1]])
                ->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Ventas = Venta::Where([['sucursal_id', 1]])->orderBy('id', 'desc')->get();
        }
        $this->Venta = Venta::Where('Folio', '=', $this->Folio)->orderBy('Aux', 'desc')->first();
        $this->ListaFT =  Venta_Producto::Where([['venta_id', '=', $this->Venta->id], ['producto_id', '!=', 'NULL']])->get();
        return view('livewire.venta.puntoventa');
    }
    public function abrirModal($MOD)
    {
        switch ($MOD) {
            case '1':
                $this->ModalP = true;
                $this->CD = '';
                $this->Precio = '';
                break;
            case '2':
                $this->ModalC = true;
                $this->searchCliente = '';
                break;
            case '3':
                $this->ModalCOT = true;
                break;
            case '4':
                $this->ModalV = true;
                break;
            case '5':
                $this->ModalCobro = true;
                $this->PAGO = '';
                $this->FormasP = '';
                break;
        }
    }
    public function cerrarModal($MOD)
    {
        switch ($MOD) {
            case '1':
                $this->ModalP = false;
                $this->search = '';
                $this->Cant = '';
                $this->Desc = '';
                $this->Promo = '';
                break;
            case '2':
                $this->ModalC = false;
                break;
            case '3':
                $this->ModalCOT = false;
                break;
            case '4':
                $this->ModalV = false;
                break;
            case '5':
                $this->ModalCobro = false;
                $this->FP = '';
                break;
        }
    }
    public function agregarP()
    {
        if ($this->search) {
            $Producto = Producto::Where([['id', $this->search]])->first();
            if ($this->CD >= $this->Cant) {
                if ($this->Desc) {
                    Venta_Producto::updateOrCreate(
                        [
                            'Cantidad' => $this->Cant,
                            'Descuento' => $this->Desc,
                            'Promo' => $this->Promo,
                            'Precio' => $Producto->P1,
                            'producto_id' => $Producto->id,
                            'venta_id' => $this->Venta->id,
                        ]
                    );
                } else {
                    Venta_Producto::updateOrCreate(
                        [
                            'Cantidad' => $this->Cant,
                            'Descuento' => 0,
                            'Promo' => $this->Promo,
                            'Precio' => $Producto->P1,
                            'producto_id' => $Producto->id,
                            'venta_id' => $this->Venta->id,
                        ]
                    );
                }
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Producto Agregado Exitosamente',
                    'type' => 'success'
                ]);
                $this->cerrarModal(1);
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Producto Sin Stock',
                    'type' => 'error'
                ]);
            }
        }
    }
    public function eliminarP($id)
    {
        Venta_Producto::findOrFail($id)->delete();
        return redirect()->route('PuntoVenta');
    }
    public function cobrar()
    {
        $TotalC = 0;
        $venta = Venta::Where([['Folio', $this->Folio]])->first();
        $Cantidades = Venta_Producto::Where([['venta_id', $venta->id]])->get();
        if ($this->ListaFT != '[]') {
            foreach ($Cantidades as $cantidad) {
                $TotalC += $cantidad->Cantidad * $cantidad->Precio - $cantidad->Descuento;
                $CantDisp = Almacen_Producto::Where([['producto_id', $cantidad->producto_id], ['almacen_id', 1]])->first();
                if ($CantDisp) {
                    Almacen_Producto::updateOrCreate(
                        ['producto_id' => $cantidad->producto_id, 'almacen_id' => 1],
                        [
                            'Stock' => $CantDisp->Stock - $cantidad->Cantidad,
                        ]
                    );
                }
            }
            if ($this->PAGO) {
                $cambio = $this->PAGO - $TotalC;
                if ($cambio >= 0) {
                    if ($this->searchCliente != '') {
                        Venta::updateOrCreate(
                            ['Folio' => $this->Folio],
                            [
                                'Importes' => $TotalC,
                                'cliente_id' => $this->searchCliente,
                                'empleado_id' => null, //ID DEL EMPLEADO PENDIENTE
                                'sucursal_id' => 1,
                                'forma_id' => $this->FP,
                            ]
                        );
                        $this->dispatchBrowserEvent('swal', [
                            'title' => 'VENTA COMPLETA <br> CAMBIO:  $' . $cambio. '<br>'. $this->ListaFT,
                            'type' => 'success'
                        ]);
                    } else {
                        $this->dispatchBrowserEvent('swal', [
                            'title' => 'Selecciona un Cliente',
                            'type' => 'error'
                        ]);
                    }
                    $this->Cli = '';
                    $this->searchCliente = null;
                    $this->cerrarModal(5);
                } else {
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Pago Insuficiente',
                        'type' => 'error'
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Agrega el Monto Pagado',
                    'type' => 'error'
                ]);
            }
        }
    }
}
