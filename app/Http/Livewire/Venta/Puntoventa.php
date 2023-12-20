<?php

namespace App\Http\Livewire\Venta;

use App\Models\Almacen_Producto;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Credito;
use App\Models\FormaPago;
use App\Models\Lote;
use App\Models\MetodoPago;
use App\Models\Producto;
use App\Models\Traspaso;
use App\Models\Venta;
use App\Models\Venta_Producto;
use Livewire\Component;

class Puntoventa extends Component
{
    public $Folio, $Estatus = 'Registro', $idaux, $Productos, $Cant, $search, $Desc, $Promo, $Precio = 0, $ListaFT, $Total = 0;
    public $ModalP = false, $ModalC = false, $ModalCOT = false, $ModalV = false, $ModalCobro = false, $ModalTRP = false, $ModalCRED = false;
    public $Venta, $CD, $Clientes, $searchCliente, $Cli, $TArt = 0, $Cambio, $searchCot, $Cotizaciones, $searchVent, $Ventas;
    public $PAGO, $FP, $CAMBIO, $FormasP, $ActualizarStock, $Lotes, $lote, $searchTRP, $Traspasos, $CRED, $Metodos, $searchCRED, $Creditos;
    public function render()
    {
        $this->Productos = Almacen_Producto::Where([['almacen_id', 1], ['Stock', '!=', 'null']])->get();
        $this->Clientes = Cliente::all();
        $this->FormasP = FormaPago::all();
        $this->Metodos = MetodoPago::all();
        $FolioCon = Venta::Where('sucursal_id', '=', auth()->user()->empleado->sucursal_id)->orderBy('Aux', 'desc')->first();
        if ($FolioCon) {
            $Num = $FolioCon->Aux;
            $this->idaux = $Num + 1;
            $this->Folio = 'VNT0' . auth()->user()->empleado->sucursal_id . $this->idaux . auth()->user()->empleado->id; //AGREGAR EL ID DEL USUARIO
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
            $this->Folio = 'VNT0' . auth()->user()->empleado->sucursal_id . $this->idaux . auth()->user()->empleado->id; //AGREGAR EL ID DEL USUARIO //FALTAN DATOS 
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
            //ALMACEN VARIABLE
            $this->Lotes = Lote::Where([['producto_id', $this->search], ['almacen_id', auth()->user()->empleado->sucursal_id], ['Cantidad', '>', '0']])->get();
            if ($this->Lotes) {
                $CantDisp = Lote::Where([['id', $this->lote]])->first();
                if ($CantDisp) {
                    $this->CD = $CantDisp->Cantidad;
                }
            }
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
            $this->Cotizaciones = Cotizacion::Where([['Folio', 'like', '%' . $this->searchCot . '%'], ['producto_id', null], ['almacen_id', auth()->user()->empleado->sucursal_id]])
                ->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Cotizaciones = Cotizacion::Where([['producto_id', null], ['almacen_id', auth()->user()->empleado->sucursal_id]])->orderBy('id', 'desc')->get();
        }
        //MODAL TRASPASO
        if ($this->searchTRP) {
            //Almacen VARIABLE
            $this->Traspasos = Traspaso::Where([['Folio', 'like', '%' . $this->searchTRP . '%'], ['producto_id', null], ['almacenO_id', auth()->user()->empleado->sucursal_id]])
            ->orWhere([['Folio', 'like', '%' . $this->searchTRP . '%'], ['producto_id', null], ['almacenD_id', auth()->user()->empleado->sucursal_id]])->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Traspasos = Traspaso::Where([['producto_id', null], ['almacenO_id', auth()->user()->empleado->sucursal_id]])
            ->orWhere([['producto_id', null], ['almacenD_id', auth()->user()->empleado->sucursal_id]])->orderBy('id', 'desc')->get();
        }
        //MODAL CREDITOS
        if ($this->searchCRED) {
            //Almacen VARIABLE
            $this->Creditos = Credito::Where([['Folio', 'like', '%' . $this->searchCRED . '%'], ['sucursal_id', auth()->user()->empleado->sucursal_id]])
                ->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Creditos = Credito::Where([['sucursal_id', auth()->user()->empleado->sucursal_id]])->orderBy('id', 'desc')->get();
        }
        //MODAL VENTA
        if ($this->searchVent) {
            //Almacen VARIABLE
            $this->Ventas = Venta::Where([['Folio', 'like', '%' . $this->searchVent . '%'], ['sucursal_id', auth()->user()->empleado->sucursal_id]])
                ->orderBy('id', 'desc')->get(); //ALMACEN VARIABLE
        } else {
            $this->Ventas = Venta::Where([['sucursal_id', auth()->user()->empleado->sucursal_id]])->orderBy('id', 'desc')->get();
        }
        $this->Venta = Venta::Where('Folio', '=', $this->Folio)->orderBy('Aux', 'desc')->first();
        $this->ListaFT =  Venta_Producto::Where([['venta_id', '=', $this->Venta->id], ['producto_id', '!=', 'NULL']])->get();
        return view('livewire.Venta.Puntoventa');
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
            case '6':
                $this->ModalTRP = true;
                $this->searchTRP = '';
                break;
            case '7':
                $this->ModalCRED = true;
                $this->searchCRED = '';
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
            case '6':
                $this->ModalTRP = false;
                break;
            case '7':
                $this->ModalCRED = false;
                break;
        }
    }
    public function agregarP()
    {
        if ($this->search) {
            $Producto = Producto::Where([['id', $this->search]])->first();
            if ($this->lote) {
                if ($this->CD >= $this->Cant && $this->Cant != 0) {
                    if ($this->Desc) {
                        Venta_Producto::updateOrCreate(
                            [
                                'Cantidad' => $this->Cant,
                                'Descuento' => $this->Desc,
                                'Promo' => $this->Promo,
                                'Precio' => $Producto->P1,
                                'producto_id' => $Producto->id,
                                'venta_id' => $this->Venta->id,
                                'lote_id' => $this->lote,
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
                                'lote_id' => $this->lote,
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
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Selecciona un Lote',
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
            if ($this->PAGO) {
                foreach ($Cantidades as $cantidad) {
                    $TotalC += $cantidad->Cantidad * $cantidad->Precio - $cantidad->Descuento;
                }
                $cambio = $this->PAGO - $TotalC;
                if ($cambio >= 0 || $this->CRED == 'PPD') {
                    if ($this->searchCliente != '') {
                        foreach ($Cantidades as $cantidad) {
                            $CantDisp = Almacen_Producto::Where([['producto_id', $cantidad->producto_id], ['almacen_id', 1]])->first();
                            if ($CantDisp) {
                                Almacen_Producto::updateOrCreate(
                                    ['producto_id' => $cantidad->producto_id, 'almacen_id' => auth()->user()->empleado->sucursal_id],
                                    [
                                        'Stock' => $CantDisp->Stock - $cantidad->Cantidad,
                                    ]
                                );
                                Lote::updateOrCreate(
                                    ['id' => $cantidad->lote_id],
                                    [
                                        'Cantidad' => $cantidad->Lote->Cantidad - $cantidad->Cantidad,
                                    ]
                                );
                            }
                        }
                        if ($this->CRED == 'PPD') {
                            Venta::updateOrCreate(
                                ['Folio' => $this->Folio],
                                [
                                    'Importes' => $TotalC,
                                    'cliente_id' => $this->searchCliente,
                                    'empleado_id' => auth()->user()->empleado->id, //ID DEL EMPLEADO PENDIENTE
                                    'sucursal_id' => auth()->user()->empleado->sucursal_id,
                                    'forma_id' => $this->FP,
                                ]
                            );
                            Credito::updateOrCreate(
                                [
                                    'Total' => $TotalC,
                                    'venta_id' => $venta->id,
                                    'cliente_id' => $this->searchCliente,
                                    'sucursal_id' => auth()->user()->empleado->sucursal_id,
                                    'Folio' => $this->Folio,
                                ]
                            );
                            $this->dispatchBrowserEvent('swal', [
                                'title' => 'VENTA A CREDITO <br> COMPLETA',
                                'type' => 'success'
                            ]);
                        }
                        if ($this->CRED == 'PUE') {
                            Venta::updateOrCreate(
                                ['Folio' => $this->Folio],
                                [
                                    'Importes' => $TotalC,
                                    'cliente_id' => $this->searchCliente,
                                    'empleado_id' => auth()->user()->empleado->id, //ID DEL EMPLEADO PENDIENTE
                                    'sucursal_id' => auth()->user()->empleado->sucursal_id,
                                    'forma_id' => $this->FP,
                                ]
                            );
                            $this->dispatchBrowserEvent('swal', [
                                'title' => 'VENTA COMPLETA <br> CAMBIO:  $' . $cambio,
                                'type' => 'success'
                            ]);
                        }
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
