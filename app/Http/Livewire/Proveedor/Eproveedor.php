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
    public function actualizar(){
        if ($this->NM == null) {
            Proveedor::updateOrCreate(
                ['id' => $this->ide],
                [
                'NEMP' => null,
                'Nombre' => $this->N,
                'ApP' => $this->ApP,
                'ApM' => $this->ApM,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->CE,
                'CP' => $this->CP,
                'Estado' => $this->EST,
                'Mun' => $this->MUN,
                'Col' => $this->COL,
                'Calle' => $this->CALLE,
                'TipoP' => $this->TP,
                'RFC' => $this->RFC,
                'NumExt' => $this->NEXT,
                'NumInt' => $this->NINT,
                'Credito' => $this->LIMC,
                'Estatus' => $this->EST
            ]);
        } else {
            Proveedor::updateOrCreate(
                ['id' => $this->ide],
                [
                'NEMP' => $this->NM,
                'Nombre' => $this->N,
                'ApP' => $this->ApP,
                'ApM' => $this->ApM,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->CE,
                'CP' => $this->CP,
                'Estado' => $this->EST,
                'Mun' => $this->MUN,
                'Col' => $this->COL,
                'Calle' => $this->CALLE,
                'TipoP' => $this->TP,
                'RFC' => $this->RFC,
                'NumExt' => $this->NEXT,
                'NumInt' => $this->NINT,
                'Credito' => $this->LIMC,
                'Estatus' => $this->EST
            ]);
        }
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
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
        $this->TP = '';
        $this->RFC = '';
        $this->NEXT = '';
        $this->NINT = '';
        $this->LIMC = '';
        $this->EST = '';
    }
    public function redic()
    {
        return redirect()->route('Proveedores');
    }
    
}
