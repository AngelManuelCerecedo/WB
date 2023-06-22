<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Ecliente extends Component
{
    public $ide, $NomRF, $ParenRF, $TelRF, $DomRF, $TC, $CC, $NCOM, $DomF, $RF, $CFDI, $TP, $RFC, $STS, $NM, $N, $ApP, $ApM, $Cel, $Tel, $CE, $CP, $EST, $MUN, $COL, $CALLE, $NEXT, $NINT, $REF, $LIMC;
    public function render()
    {
        return view('livewire.cliente.ecliente');
    }
    public function mount()
    {
        $cliente = Cliente::where('id', $this->ide)->first();
        $this->NCOM = $cliente->NomCom;
        $this->DomF = $cliente->DomicilioF;
        $this->TC = $cliente->TipoC;
        $this->CC = $cliente->Clasificacion;
        $this->RF = $cliente->Reg;
        $this->CFDI = $cliente->CFDI;
        $this->NomRF = $cliente->NomRF;
        $this->ParenRF = $cliente->ParenRF;
        $this->TelRF = $cliente->TelRF;
        $this->DomRF = $cliente->DomRF;
        $this->N = $cliente->Nombre;
        $this->ApP = $cliente->ApP;
        $this->ApM = $cliente->ApM;
        $this->Cel = $cliente->Cel;
        $this->Tel = $cliente->Tel;
        $this->CE = $cliente->Correo;
        $this->CP = $cliente->CP;
        $this->EST = $cliente->Estado;
        $this->MUN = $cliente->Mun;
        $this->COL = $cliente->Col;
        $this->CALLE = $cliente->Calle;
        $this->REF = $cliente->Referencia;
        $this->TP = $cliente->TipoP;
        $this->RFC = $cliente->RFC;
        $this->NEXT = $cliente->NumExt;
        $this->NINT = $cliente->NumInt;
        $this->LIMC = $cliente->Credito;
        $this->STS = $cliente->Estatus;
    }
    public function actualizar()
    {
        Cliente::updateOrCreate(
            ['id' => $this->ide],
            [
                'Nombre' => $this->N,
                'ApP' => $this->ApP,
                'ApM' => $this->ApM,
                'TipoP' => $this->TP,
                'TipoC' => $this->TC,
                'Clasificacion' => $this->CC,
                'NomCom' => $this->NCOM,
                'DomicilioF' => $this->DomF,
                'Reg' => $this->RF,
                'CFDI' => $this->CFDI,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->CE,
                'CP' => $this->CP,
                'Estado' => $this->EST,
                'Mun' => $this->MUN,
                'Col' => $this->COL,
                'Calle' => $this->CALLE,
                'Referencia' => $this->REF,
                'RFC' => $this->RFC,
                'NumExt' => $this->NEXT,
                'NumInt' => $this->NINT,
                'Credito' => $this->LIMC,
                'NomRF' => $this->NomRF,
                'ParenRF' => $this->ParenRF,
                'TelRF' => $this->TelRF,
                'DomRF' => $this->DomRF,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Clientes');
    }
}
