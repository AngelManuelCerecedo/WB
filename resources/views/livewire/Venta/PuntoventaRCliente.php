<?php

namespace App\Http\Livewire\Venta;

use App\Models\Cliente;
use Livewire\Component;

class PuntoventaRCliente extends Component
{
    public $NomRF,$ParenRF,$TelRF,$DomRF,$TC,$CC,$NCOM,$DomF,$RF,$CFDI,$TP, $RFC, $STS, $NM, $N, $ApP, $ApM, $Cel, $Tel, $CE, $CP, $EST, $MUN, $COL, $CALLE, $NEXT, $NINT, $REF, $LIMC;
    public function render()
    {
        return view('livewire.venta.puntoventa-r-cliente');
    }
    public function registrar(){
        Cliente::updateOrCreate([
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
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->limpiar();
        $this->redic();
    }
    public function limpiar()
    {
        $this->NM = '';
        $this->N = '';
        $this->ApP = '';
        $this->ApM = '';
        $this->Cel = '';
        $this->Tel = '';
        $this->CE = '';
        $this->CP = '';
        $this->EST = '';
        $this->MUN = '';
        $this->COL = '';
        $this->CALLE = '';
        $this->REF = '';
        $this->TP = '';
        $this->RFC = '';
        $this->NEXT = '';
        $this->NINT = '';
        $this->LIMC = '';
        $this->EST = '';
    }
    public function redic()
    {
        return redirect()->route('PuntoVenta');
    }
}
