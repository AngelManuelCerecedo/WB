<?php

namespace App\Http\Livewire\Cotizacion;

use App\Models\Almacen_Producto;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Producto;
use App\Models\Sucursal;
use Livewire\Component;

class Rcotizacion extends Component
{
    public $Folio = 'COT', $Estatus = 'Registro', $idaux, $SO, $Productos, $producto, $Cliente_id, $NombreCliente;
    public function render()
    {
        $Sucursales = Sucursal::all();
        $Clientes = Cliente::all();
        if ($this->SO) {
            $FolioCon = Cotizacion::Where('almacen_id', '=', $this->SO)->orderBy('Aux', 'desc')->first();
            if ($FolioCon) {
                $Num = $FolioCon->Aux;
                $this->idaux = $Num + 1;
                $this->Folio = 'COT0' . $this->SO . $this->idaux;
            } else {
                $this->idaux = 1;
                $this->Folio = 'COT0' . $this->SO . $this->idaux;
            }
        }
        return view('livewire.cotizacion.rcotizacion', ['Sucursales' => $Sucursales, 'Clientes' => $Clientes]);
    }
    public function registrar()
    {
        if ($this->Cliente_id == 'Publico') {
            Cotizacion::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SO,
                'Cliente' => $this->NombreCliente,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Cotizacion Registrada',
                'type' => 'success'
            ]);
        } else {
            Cotizacion::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SO,
                'cliente_id' => $this->Cliente_id,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Cotizacion Registrada',
                'type' => 'success'
            ]);
        }
        $this->redic();
    }
    public function exportar(){
        
    }
    public function redic()
    {
        $Cot = Cotizacion::Where('Folio', '=', $this->Folio)->first();
        return redirect()->route('ECotizacion', [$Cot->id]) ;
    }
}
