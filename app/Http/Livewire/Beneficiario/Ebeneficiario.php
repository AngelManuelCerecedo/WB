<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\Beneficiario;
use Livewire\Component;

class Ebeneficiario extends Component
{
    public $ide, $Nombre, $Banco, $Cuenta;
    public function render()
    {
        return view('livewire.Beneficiario.ebeneficiario');
    }
    public function mount()
    {
        $beneficiario = Beneficiario::where('id', $this->ide)->first();
        $this->Nombre = $beneficiario->Nombre;
        $this->Banco = $beneficiario->Banco;
        $this->Cuenta = $beneficiario->Cuenta;

    }
    public function registrar()
    {
        Beneficiario::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->Nombre,
                'Banco' => $this->Banco,
                'Cuenta' => $this->Cuenta,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Beneficiarios');
    }
}
