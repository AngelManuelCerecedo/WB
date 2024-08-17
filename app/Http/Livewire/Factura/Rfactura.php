<?php

namespace App\Http\Livewire\Factura;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Movimientos;
use Livewire\Component;

class Rfactura extends Component
{
    public $Folio, $Fecha, $Total, $CFDI, $Observaciones, $Estatus, $Concepto;
    public $movimientoSeleccionadaId, $searchM, $empresaSeleccionadaId, $searchE, $clienteSeleccionadaId, $searchC;
    public $Solicitud, $FechaDep, $FComplemento, $Empresas, $Clientes, $Movimientos;
    public function render()
    {
        $this->Empresas = Empresa::all();
        $this->Clientes = Cliente::all();
        $this->Movimientos = Movimientos::Where([['Movimiento', 'Deposito'],['empresa_id', $this->empresaSeleccionadaId],['cliente_id',$this->clienteSeleccionadaId]])->get();
        return view('livewire.factura.rfactura');
    }
}
