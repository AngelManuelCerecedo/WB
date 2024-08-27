<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Banco;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\Gastos;
use App\Models\Movimientos;
use Livewire\Component;

class Eempresa extends Component
{
    public $ide, $Nom, $Nc, $RFC, $Giro;
    public $NombreB, $NumeroC, $Bancos, $movimientos,$movimientosR;
    public $ModalMov = false, $ModalTrans = false, $BIDEAUX, $AUXFOLIO,$CERO;
    public $gastos, $ingresos, $BIAUX, $movimientosENV;
    public $CuentaId, $Fecha, $empresaSeleccionadaId, $Empresas, $BancosModal, $searchE, $Concepto, $Banco, $Monto;
    public function render()
    {
        $this->Bancos = Banco::where('empresa_id', $this->ide)->get();
        $this->Empresas = Empresa::all();
        return view('livewire.empresa.eempresa');
    }
    public function mount()
    {
        $empresa = Empresa::where('id', $this->ide)->first();
        $this->Nom = $empresa->Nombre;
        $this->Nc = $empresa->NCorto;
        $this->RFC = $empresa->RFC;
        $this->Giro = $empresa->Giro;
    }
    public function actualizar()
    {
        Empresa::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->Nom,
                'NCorto' => $this->Nc,
                'RFC' => $this->RFC,
                'Giro' => $this->Giro,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function agregarBan()
    {
        if ($this->NombreB && $this->NumeroC) {
            Banco::updateOrCreate(
                [
                    'Nombre' => $this->NombreB,
                    'Cuenta' => $this->NumeroC,
                    'empresa_id' => $this->ide,
                ]
            );
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Registro Actualizado exitosamente',
                'type' => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Ingresa Los Datos Solicitados',
                'type' => 'error'
            ]);
        }
    }
    public function abrirModal($Bancoide)
    {
        $this->ModalMov = true;
        $this->BIAUX = $Bancoide;
        if ($Bancoide == 72)
        {
            $this->movimientos = Movimientos::orderBy('Fecha', 'desc')->get();
            $this->movimientosENV = Movimientos::where('bancoD_id', $Bancoide)->get();
        }
        else{
            $this->movimientos = Movimientos::where('banco_id', $Bancoide)
                ->orderBy('Fecha', 'desc') // Ordenar primero por fecha en orden descendente
                   // Luego ordenar por id en orden ascendente
                ->get();
        }
        $this->movimientosR = Movimientos::Where('bancoD_id', $Bancoide)
            ->orderBy('Fecha', 'desc')
            ->get();
    }
    public function cerrarModal()
    {
        $this->ModalMov = false;
    }
    public function abrirModalTrans($Bancoide)
    {
        $this->ModalTrans = true;
        $this->CuentaId = $Bancoide;
    }
    public function cerrarModalTrans()
    {
        $this->ModalTrans = false;
        $this->Fecha = 0;
        $this->Banco = 0;
        $this->searchE = 0;
        $this->Monto = 0;
        $this->Concepto = '';
    }
    public function updatedSearchE($value)
    {
        $Cuenta = Banco::where('id', $this->CuentaId)->first();
        $this->BancosModal = Banco::where('empresa_id', $value)
            ->where(function ($query) use ($Cuenta) {
                $query->where('Nombre', '!=', $Cuenta->Nombre)
                    ->orWhere('Cuenta', '!=', $Cuenta->Cuenta);
            })
            ->get();
    }
    public function transferir()
    {
        $TotenCO = Banco::where('id', $this->CuentaId)->first();
        $TotenCD = Banco::where('id', $this->Banco)->first();
        $EmpreDest = Empresa::where('id', $this->searchE)->first();
        if (0 <= ($TotenCO->Total - $this->Monto)) {
            Movimientos::create(
                [
                    'Movimiento' => 'Transferencia',
                    'Fecha' => $this->Fecha,
                    'Total' => $this->Monto,
                    'empresaD_id' => $this->searchE,
                    'bancoD_id' => $this->Banco,
                    'empresa_id' => $this->ide,
                    'banco_id' => $this->CuentaId,
                    'Concepto' => $this->Concepto,
                    'empleado_id' => auth()->user()->empleado->id,
                ]
            );
            //Cuenta Origen
            Banco::updateOrCreate(
                ['id' => $this->CuentaId],
                [
                    'Total' =>  $TotenCO->Total - $this->Monto,
                ]
            );
            //Cuenta Destino
            Banco::updateOrCreate(
                ['id' => $this->Banco],
                [
                    'Total' => $TotenCD->Total + $this->Monto,
                ]
            );
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Transferencia Exitosa',
                'type' => 'success'
            ]);
            $this->cerrarModalTrans();
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Saldo Insuficiente',
                'type' => 'error'
            ]);
        }
    }
    public function redic()
    {
        return redirect()->route('EEmpresa', $this->ide);
    }
}
