<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Banco;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\Gastos;
use Livewire\Component;

class Eempresa extends Component
{
    public $ide, $Nom, $Nc, $RFC, $Giro;
    public $NombreB, $NumeroC, $Bancos, $movimientos;
    public $ModalMov = false;
    public function render()
    {
        $this->Bancos = Banco::where('empresa_id', $this->ide)->get();
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
        $gastos = Gastos::select('id', 'Fecha', 'Total', 'ficha_id', 'empleado_id')
            ->where('banco_id', $Bancoide)
            ->with('fichaGasto:id,Folio') // Cargar la relación 'fichaGasto' con solo el campo 'Folio'
            ->get();

        // Obtener depósitos con información de la ficha correspondiente
        $depositos = Depositos::select('id', 'Fecha', 'Total', 'ficha_id', 'empleado_id')
            ->where('banco_id', $Bancoide)
            ->with('fichaIngreso:id,Folio') // Cargar la relación 'fichaIngreso' con solo el campo 'Folio'
            ->get();
        $this->movimientos = $gastos->concat($depositos);
    }
    public function cerrarModal()
    {
        $this->ModalMov = false;
    }
    public function redic()
    {
        return redirect()->route('EEmpresa', $this->ide);
    }
}
