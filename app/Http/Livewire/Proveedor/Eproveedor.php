<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;

class Eproveedor extends Component
{
    public $TP, $RFC, $STS, $NM, $N, $ApP, $ApM, $Cel, $Tel, $CE, $CP, $EST, $MUN, $COL, $CALLE, $NEXT, $NINT, $REF, $LIMC, $DCRED, $ide;
    public function render()
    {
        return view('livewire.proveedor.eproveedor');
    }
    public function mount(){
        $proveedor = Proveedor::where('id',$this->ide)->first();
        $this->NM = $proveedor->NEMP;
        $this->N = $proveedor->Nombre;
        $this->ApP = $proveedor->ApP;
        $this->ApM = $proveedor->ApM;
        $this->Cel = $proveedor->Cel;
        $this->Tel = $proveedor->Tel;
        $this->CE = $proveedor->Correo;
        $this->CP = $proveedor->CP;
        $this->EST = $proveedor->Estado;
        $this->MUN = $proveedor->Mun;
        $this->COL = $proveedor->Col;
        $this->CALLE = $proveedor->Calle;
        $this->TP = $proveedor->TipoP;
        $this->RFC = $proveedor->RFC;
        $this->NEXT = $proveedor->NumExt;
        $this->NINT = $proveedor->NumInt;
        $this->LIMC = $proveedor->Credito;
        $this->EST = $proveedor->Estatus;
    }
}
