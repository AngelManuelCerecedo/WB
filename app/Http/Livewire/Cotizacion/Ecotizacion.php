<?php

namespace App\Http\Livewire\Cotizacion;

use App\Models\Almacen_Producto;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Producto;
use App\Models\Sucursal;
use Livewire\Component;

class Ecotizacion extends Component
{
    public $Folio = 'COT', $Estatus, $idaux, $SO, $Productos, $Cliente_id, $NombreCliente, $ide;
    public $Cant, $search, $importe, $ListaFT, $Precio, $CD, $CantDisp, $PR, $Total, $CantTOT;
    public function render()
    {
        $Sucursales = Sucursal::all();
        $Clientes = Cliente::all();
        $this->ListaFT =  Cotizacion::Where([['Folio', '=', $this->Folio], ['producto_id', '!=', 'NULL']])->get();
        if ($this->search) {
            $this->Precio = Producto::Where('id', $this->search)->first();
            $CantDisp = Almacen_Producto::Where([['producto_id', $this->search], ['almacen_id', $this->SO]])->first();
            $this->CD = $CantDisp->Stock;
        }
        $this->Productos = Almacen_Producto::Where([['almacen_id', $this->SO], ['Stock', '!=', 'null']])->get();
        return view('livewire.Cotizacion.Ecotizacion', ['Sucursales' => $Sucursales, 'Clientes' => $Clientes]);
    }
    public function mount()
    {
        $Cotizacion = Cotizacion::Where('id', $this->ide)->first();
        $this->Estatus = $Cotizacion->Estatus;
        $this->Folio = $Cotizacion->Folio;
        $this->SO = $Cotizacion->almacen_id;
        if ($Cotizacion->cliente_id) {
            if ($Cotizacion->cliente->TipoP == 'Fisica') {
                $this->NombreCliente = $Cotizacion->cliente->Nombre . ' ' . $Cotizacion->cliente->ApP . ' ' . $Cotizacion->cliente->ApM;
            } else {
                $this->NombreCliente = $Cotizacion->cliente->NomCom;
            }
        } else {
            $this->NombreCliente = $Cotizacion->Cliente;
        }
    }
    public function updatingSearch()
    {
        $this->Cant = '';
        $this->PR = '';
    }
    public function agregarA()
    {
        $ProdenLista = Cotizacion::Where([['producto_id', $this->search], ['Folio', $this->Folio]])->first();
        if (!$ProdenLista) {
            if ($this->Cant) {
                $Cotizacion = Cotizacion::Where('id', $this->ide)->first();
                $Producto = Almacen_Producto::Where([['producto_id', '=', $this->search], ['almacen_id', '=', $this->SO]])->first();
                if ($Producto) {
                    if ($Producto->Stock > 0 && $Producto->Stock >= $this->Cant) {
                        Cotizacion::updateOrCreate(
                            [
                                'Folio' => $this->Folio,
                                'Aux' => $Cotizacion->Aux,
                                'almacen_id' => $this->SO,
                                'producto_id' => $this->search,
                                'Importe1' => $this->PR,
                                'Importe2' => $this->PR * $this->Cant,
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
    }
    public function eliminarP($id)
    {
        Cotizacion::findOrFail($id)->delete();
    }
    public function registrar($total)
    {
        Cotizacion::updateOrCreate(
            ['Folio' => $this->Folio],
            [
                'Estatus' => 'Iniciado',
                'Importe3' => $total,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Cotizacion Iniciada',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        if (true) {
            return redirect()->route('PuntoVenta');
        } else {
            return redirect()->route('Cotizaciones');
        }
    }
}
