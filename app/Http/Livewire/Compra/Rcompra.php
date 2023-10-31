<?php

namespace App\Http\Livewire\Compra;

use App\Models\Almacen;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Livewire\Component;

class Rcompra extends Component
{
    public $Folio = 'COM', $Estatus = 'Registro', $Fecha, $SD, $TC, $Proveedor_id, $TCE, $Obs, $FC, $FLC, $idaux;
    public $CE = 0, $IC = 0, $IT = 0, $DESC = 0, $IP = 0, $IporP = 0;
    public function render()
    {
        $Sucursales = Almacen::all();
        $Proveedores = Proveedor::all();
        $FolioCon = Compra::orderBy('Aux', 'desc')->first();
        if ($FolioCon) {
            $Num = $FolioCon->Aux;
            $this->idaux = $Num + 1;
            $this->Folio = 'COM00' . $this->idaux;
        } else {
            $this->idaux = 1;
            $this->Folio = 'COM00' . $this->idaux;
        }
        return view('livewire.compra.rcompra', ['Sucursales' => $Sucursales, 'Proveedores' => $Proveedores]);
    }
    public function registrar()
    {
        if ($this->TC != 'Credito' && $this->TCE != 'Compra') {
            Compra::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SD,
                'Fecha' => $this->Fecha,
                'TipoC' => $this->TC,
                'proveedor_id' => $this->Proveedor_id,
                'TipoCE' => $this->TCE,
                'Obs' => $this->Obs,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Compra Registrada',
                'type' => 'success'
            ]);
        }
        if ($this->TCE == 'Compra' && $this->TC != 'Credito') {
            Compra::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SD,
                'Fecha' => $this->Fecha,
                'TipoC' => $this->TC,
                'proveedor_id' => $this->Proveedor_id,
                'TipoCE' => $this->TCE,
                'Obs' => $this->Obs,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Compra Registrada',
                'type' => 'success'
            ]);
        }
        if ($this->TC == 'Credito' && $this->TCE != 'Compra') {
            Compra::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SD,
                'Fecha' => $this->Fecha,
                'TipoC' => $this->TC,
                'proveedor_id' => $this->Proveedor_id,
                'TipoCE' => $this->TCE,
                'FechaC' => $this->FC,
                'FechaL' => $this->FLC,
                'Obs' => $this->Obs,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Compra Registrada',
                'type' => 'success'
            ]);
        }
        if ($this->TC == 'Credito' && $this->TCE == 'Compra') {
            Compra::updateOrCreate([
                'Aux' => $this->idaux,
                'Folio' => $this->Folio,
                'Estatus' => $this->Estatus,
                'almacen_id' => $this->SD,
                'Fecha' => $this->Fecha,
                'TipoC' => $this->TC,
                'proveedor_id' => $this->Proveedor_id,
                'TipoCE' => $this->TCE,
                'FechaC' => $this->FC,
                'FechaL' => $this->FLC,
                'Obs' => $this->Obs,
            ]);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Compra Registrada',
                'type' => 'success'
            ]);
        }

        $this->redic();
    }
    public function redic()
    {
        $Com = Compra::Where('Folio', '=', $this->Folio)->first();
        return redirect()->route('ECompra', [$Com->id]) ;
    }
}
