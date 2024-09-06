<?php

namespace App\Http\Livewire\Factura;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\FormaPago;
use App\Models\MetodoPago;
use App\Models\Movimientos;
use Livewire\Component;

class Rfactura2 extends Component
{
    public $Folio, $Fecha, $Total, $CFDI, $Observaciones, $Estatus, $Concepto, $Metodos, $Metodo, $Formas, $Forma;
    public $movimientoSeleccionadaId, $searchM, $empresaSeleccionadaId, $searchE, $clienteSeleccionadaId, $searchC, $searchMRS;
    public $Solicitud, $FechaDep, $FComplemento, $Empresas, $Clientes, $Movimientos, $AUX, $TotalDep, $TotCom, $FechaCom;
    public function render()
    {
        $this->Empresas = Empresa::all();
        $this->Clientes = Cliente::all();
        $this->Metodos = MetodoPago::all();
        $this->Formas = FormaPago::all();
        if ($this->movimientoSeleccionadaId) {
            $MovimientoFact = Movimientos::find($this->movimientoSeleccionadaId);
            $this->FechaDep = $MovimientoFact->Fecha;
            if ($this->Metodo == 'PUE') {
                $this->Total = number_format($MovimientoFact->Total, 2, '.', ',');
            }
            if ($this->Metodo == 'PPD') {
                $this->TotCom = number_format($MovimientoFact->Total, 2, '.', ',');
            }
        }
        if ($this->empresaSeleccionadaId) {
            $this->Movimientos = Movimientos::Where([['FolioF'], ['Movimiento', 'Transferencia'], ['empresa_id', $this->empresaSeleccionadaId]])->get();
        }
        return view('livewire.factura.rfactura2');
    }
    public function mount()
    {
        $this->Fecha = date('Y-m-d');
    }
    public function registrar()
    {
        Factura::create(
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
                'empresa_id' => $this->searchE,
                'formap_id' => $this->Forma,
                'movimiento_id' => $this->movimientoSeleccionadaId,
                'empleado_id' => auth()->user()->empleado->id,
            ]
        );
        Movimientos::where('id', $this->movimientoSeleccionadaId)
            ->update([
                'FolioF' => $this->Folio,
                'FechaF' => $this->Fecha,
            ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Factura Guardada Exitosamente',
            'type' => 'success'
        ]);
        $Factura = Factura::latest()->first();
        return redirect()->route('EFactura2', [$Factura->id]);
    }
}
