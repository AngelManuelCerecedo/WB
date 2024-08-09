<?php

namespace App\Http\Livewire\Beneficiario;

use App\Models\Beneficiario;
use Livewire\Component;

class Rbeneficiario extends Component
{
    public $Nombre, $Banco, $Cuenta;
    public function render()
    {
        return view('livewire.Beneficiario.rbeneficiario');
    }
    public function registrar()
    {
        Beneficiario::updateOrCreate(
            [
                'Nombre' => $this->Nombre,
                'Banco' => $this->Banco,
                'Cuenta' => $this->Cuenta,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Beneficiarios');
    }
}
