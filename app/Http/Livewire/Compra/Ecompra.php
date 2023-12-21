<?php

namespace App\Http\Livewire\Compra;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Compra;
use App\Models\Lote;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class Ecompra extends Component
{
    public $Folio = 'COM', $Estatus = 'Registro', $Fecha, $SD, $TC, $Proveedor_id, $TCE, $Obs, $FC, $FLC, $idaux;
    public $CE = 0, $IC = 0, $IT, $DESC, $IP, $IporP = 0, $ide, $search, $Productos, $ListaFT, $CantTOT, $Total, $PrecioB;
    public $PB, $Cant, $SDID, $PC, $aux, $modalAÑ = false, $Producto, $FechaCad, $NumLot, $AUXCANTIDAD, $DescP, $descporP, $Lotes;
    public function render()
    {
        $Sucursales = Sucursal::all();
        $Proveedores = Proveedor::all();
        $this->Productos = Almacen_Producto::Where([['almacen_id', 7]])->get();
        $this->ListaFT =  Compra::Where([['Folio', '=', $this->Folio], ['producto_id', '!=', 'NULL']])->get();
        if ($this->Estatus == 'Registro') {
            if ($this->search) {
                $Precio = Producto::Where('id', $this->search)->first();
                $this->PB = $Precio->Precio;
            }
            $this->aux = 0;
            $this->descporP = 0;
            foreach ($this->ListaFT as $Registro) {
                $this->aux += $Registro->Cantidad * $Registro->PrecioC;
                if ($Registro->Desc) {
                    $this->descporP += $Registro->Desc;
                }
            }
            if ($this->descporP) {
                $this->aux = $this->aux - $this->descporP;
            }
            $this->IT = number_format($this->aux, 5);
            if ($this->DESC) {
                $this->aux = $this->aux - $this->DESC;
            }
            $this->IporP = number_format($this->aux, 5);
            $this->IC = number_format($this->aux, 5);
            if ($this->IP) {
                $aux1 = $this->aux - $this->IP;
                $this->IporP = number_format($aux1, 5);
            }
        }
        return view('livewire.Compra.Ecompra', ['Sucursales' => $Sucursales, 'Proveedores' => $Proveedores]);
    }
    public function mount()
    {
        $Compra = Compra::Where('id', $this->ide)->first();
        $this->Estatus = $Compra->Estatus;
        $this->idaux = $Compra->Aux;
        $this->Folio = $Compra->Folio;
        $this->SD = $Compra->almacen->Nombre;
        $this->SDID = $Compra->almacen_id;
        $this->Fecha = $Compra->Fecha;
        $this->TC = $Compra->TipoC;
        $this->IC = $Compra->ImporteC;
        $this->IT = $Compra->ImporteTot;
        if ($this->DESC == 'NULL') {
            $this->DESC = 0;
        } else {
            $this->DESC = $Compra->Desc;
        }
        if ($this->IP == 'NULL') {
            $this->IP = 0;
        } else {
            $this->IP = $Compra->ImportePag;
        }
        $this->IporP = $Compra->ImporteporPagar;
        if ($Compra->proveedor->TipoP == 'Moral') {
            $this->Proveedor_id = $Compra->proveedor->NEMP;
        } else {
            $this->Proveedor_id = $Compra->proveedor->RFC . ' - ' . $Compra->proveedor->Nombre . ' ' . $Compra->proveedor->ApP;
        }
        $this->TCE = $Compra->TipoCE;
        $this->CE = $Compra->CostoE;
        $this->FC = $Compra->FechaC;
        $this->FLC = $Compra->FechaL;
        $this->Obs = $Compra->Obs;
    }
    public function agregarA()
    {
        $ProdenLista = Compra::Where([['producto_id', $this->search], ['Folio', $this->Folio]])->first();
        if (!$ProdenLista) {
            Compra::updateOrCreate(
                [
                    'Aux' => $this->idaux,
                    'Folio' => $this->Folio,
                    'Estatus' => $this->Estatus,
                    'almacen_id' => $this->SDID,
                    'Fecha' => $this->Fecha,
                    'producto_id' => $this->search,
                    'Cantidad' => $this->Cant,
                    'Desc' => $this->DescP,
                    'PrecioC' => $this->PC,
                ]
            );
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Producto Ya Registrado',
                'type' => 'error'
            ]);
        }
    }
    public function eliminarP($id)
    {
        Compra::findOrFail($id)->delete();
    }
    public function registrar()
    {
        Compra::updateOrCreate(
            ['id' => $this->ide],
            [
                'ImporteC' => $this->IC,
                'ImporteTot' => $this->IT,
                'Desc' => $this->DESC,
                'ImportePag' => $this->IP,
                'ImporteporPagar' => $this->IporP,
                'Estatus' => 'Ingresada'
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Compra Ingresada',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Compras');
    }
    public function cerrarModal()
    {
        $this->modalAÑ = false;
    }
    public function agregarLot($id)
    {
        $this->Producto = Producto::Where([['id', $id]])->first();
        $this->Lotes = Lote::Where([['producto_id',$this->Producto->id],['compra_id',$this->ide]])->orderBy('id', 'desc')->get();
        $this->modalAÑ = true;
    }
    public function guardarlote()
    {
        $Compra = Compra::Where('id', $this->ide)->first();
        Lote::updateOrCreate(
            [
                'Numero' => $this->NumLot,
                'Fecha' => $this->FechaCad,
                'Cantidad' => $this->AUXCANTIDAD,
                'producto_id' => $this->Producto->id,
                'compra_id' => $this->ide,
                'almacen_id' => $Compra->almacen->id,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Lote Registrado',
            'type' => 'success'
        ]);
        $this->cerrarModal();
        $this->limpMod();
    }
    public function limpMod(){
        $this->NumLot = '';
        $this->FechaCad = '';
        $this->AUXCANTIDAD = '';
    }
    public function ingresar(){
        $Compras = Compra::Where([['Folio',$this->Folio],['producto_id','!=',null]])->get();
        foreach ($Compras as $compra) {
            $Producto = Almacen_Producto :: Where([['almacen_id',$compra->almacen_id],['producto_id',$compra->producto_id]])->first();
            $Cant = $Producto->Stock + $compra->Cantidad;
            Almacen_Producto::updateOrCreate(
                ['id' =>$Producto->id],
                [
                    'Stock' => $Cant,
                ]
            );
        }
        Compra::updateOrCreate(
            ['Folio' => $this->Folio],
            [
                'Estatus' => 'Aceptada',
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Compra Aceptada',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function rechazar(){
        $Compras = Compra::Where([['Folio',$this->Folio],['producto_id','!=',null]])->get();
        Compra::updateOrCreate(
            ['Folio' => $this->Folio],
            [
                'Estatus' => 'Rechazada',
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Compra Rechazada',
            'type' => 'error'
        ]);
        $this->redic();
    }
}
