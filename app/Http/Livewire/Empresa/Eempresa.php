<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Banco;
use App\Models\Empresa;
use Livewire\Component;

class Eempresa extends Component
{
    public $ide, $Nom, $Nc, $RFC, $Giro;
    public $NombreB,$NumeroC,$Bancos;
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
    public function redic()
    {
        return redirect()->route('EEmpresa', $this->ide);
    }
}
