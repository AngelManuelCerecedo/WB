<?php

namespace App\Http\Livewire\Factura;

use App\Models\Cliente;
use App\Models\Complemento;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\FormaPago;
use App\Models\MetodoPago;
use App\Models\Movimientos;
use Livewire\Component;

use function GuzzleHttp\Promise\all;

class Efactura extends Component
{
    public $ide, $Folio, $Fecha, $Total, $CFDI, $Observaciones, $Estatus, $Concepto, $Metodos, $Metodo, $Formas, $Forma;
    public $movimientoSeleccionadaId, $searchM, $empresaSeleccionadaId, $searchE, $clienteSeleccionadaId, $searchC, $searchMRS;
    public $Solicitud, $FechaDep, $FComplemento, $Empresas, $Clientes, $Movimientos, $AUX, $TotalDep, $factura, $TotalC, $FechaC, $AuxMov;
    public $Complementos;
    public function render()
    {
        $this->Empresas = Empresa::all();
        $this->Clientes = Cliente::all();
        $this->Metodos = MetodoPago::all();
        $this->Formas = FormaPago::all();
        $this->Complementos = Complemento::Where('factura_id', $this->ide)->get();
        if ($this->movimientoSeleccionadaId) {
            $MovimientoFact = Movimientos::find($this->movimientoSeleccionadaId);
            $this->FechaDep = $MovimientoFact->Fecha;
            if ($this->Metodo == 'PUE') {
                $this->Total = number_format($MovimientoFact->Total, 2);
            } else {
                $this->Total = number_format($this->factura->Total, 2);
            }
        }
        if ($this->clienteSeleccionadaId) {
            $this->Movimientos = Movimientos::Where([['FolioF'], ['Movimiento', 'Deposito'], ['cliente_id', $this->clienteSeleccionadaId]])->get();
        }
        return view('livewire.factura.efactura');
    }
    public function updatedSearchC($value)
    {
        $this->Movimientos = Movimientos::Where([['FolioF'], ['Movimiento', 'Deposito'], ['cliente_id', $value]])->get();
    }
    public function updatedSearchE($value)
    {
        $this->Movimientos = Movimientos::Where([['FolioF'], ['Movimiento', 'Deposito'], ['empresa_id', $value]])->get();
    }
    public function mount()
    {
        $this->factura = Factura::where('id', $this->ide)->first();
        $this->Fecha = $this->factura->Fecha;
        $this->Folio = $this->factura->Folio;
        $this->CFDI = $this->factura->CFDI;
        $this->Metodo = $this->factura->Metodo;
        $this->Concepto = $this->factura->Concepto;
        $this->Estatus = $this->factura->Estatus;
        $this->Solicitud = $this->factura->Ejecutivo;
        $this->Observaciones = $this->factura->Observaciones;
        $this->Total = number_format($this->factura->Total, 2);
        $this->empresaSeleccionadaId = $this->factura->empresa_id;
        $this->Forma = $this->factura->formap_id;
        $this->clienteSeleccionadaId = $this->factura->cliente_id;
        $this->movimientoSeleccionadaId = $this->factura->movimiento_id;
        $this->AuxMov =  $this->movimientoSeleccionadaId;
    }
    public function registrar()
    {
        Factura::where('id', $this->ide)->update(
            [
                'Fecha' => $this->Fecha,
                'Folio' => $this->Folio,
                'CFDI' => $this->CFDI,
                'Metodo' => $this->Metodo,
                'Concepto' => $this->Concepto,
                'Producto' => $this->Concepto,
                'Estatus' => $this->Estatus,
                'Ejecutivo' => $this->Solicitud,
                //'Credito' => $this->Credito,
                'Observaciones' => $this->Observaciones,
                'Total' => floatval(str_replace(',', '', $this->Total)),
                'empresa_id' => ($this->searchE) ? $this->searchE : $this->empresaSeleccionadaId,
                'formap_id' => $this->Forma,
                'cliente_id' => ($this->searchC) ? $this->searchC : $this->clienteSeleccionadaId,
                'movimiento_id' => $this->movimientoSeleccionadaId ?: null,
                'empleado_id' => auth()->user()->empleado->id,
            ]
        );
        if ($this->Metodo == 'PUE'){
            if ($this->AuxMov != $this->movimientoSeleccionadaId){
                Movimientos::where('id', $this->AuxMov)
                    ->update([
                        'FolioF' => null,
                        'FechaF' => null,
                ]);
            }
        }
        Movimientos::where('id', $this->movimientoSeleccionadaId)
            ->update([
                'FolioF' => $this->Folio,
                'FechaF' => $this->Fecha,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function agregarCom()
    {
        $MovimientoFact = Movimientos::find($this->movimientoSeleccionadaId);
        Complemento::create(
            [
                'Fecha' => $this->FechaDep,
                'Complemento' => $this->FComplemento,
                'Total' => $MovimientoFact->Total,
                'factura_id' => $this->ide,
                'movimiento_id' => $this->movimientoSeleccionadaId,
            ]
        );
        Movimientos::where('id', $this->movimientoSeleccionadaId)
            ->update([
                'FolioF' => 'F-'.$this->Folio.' C-'.$this->FComplemento,
                'FechaF' => $this->FechaC,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Complemento Registrado Exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function eliminarCom($id)
    {
        $complemento = Complemento::find($id);
        Movimientos::where('id', $complemento->movimiento_id)
            ->update([
                'FolioF' => null,
                'FechaF' => null,
        ]);
        Complemento::where('id', $id)->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Complemento Eliminado',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('EFactura', $this->ide);
    }
}
