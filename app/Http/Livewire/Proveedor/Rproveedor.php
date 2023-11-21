<?php

namespace App\Http\Livewire\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Rproveedor extends Component
{
    public $TP, $RFC, $STS, $NM, $N, $ApP,$TProv,$Cel, $Tel, $CE, $CP, $EST, $MUN, $COL, $CALLE, $NEXT, $NINT, $REF, $LIMC, $DCRED;
    public function render()
    {
        return view('livewire.proveedor.rproveedor');
    }
    public function registrar()
    {
        if ($this->NM == null) {
            Proveedor::updateOrCreate([
                'NEMP' => null,
                'Nombre' => $this->N,
                'ApP' => $this->ApP,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->CE,
                'CP' => $this->CP,
                'Estado' => $this->EST,
                'Mun' => $this->MUN,
                'Col' => $this->COL,
                'Calle' => $this->CALLE,
                'Referencia' => $this->REF,
                'TipoP' => $this->TP,
                'RFC' => $this->RFC,
                'NumExt' => $this->NEXT,
                'NumInt' => $this->NINT,
                'Estatus' => 'Activo',
                'TipoProv' => $this->TProv,
            ]);
        } else {
            Proveedor::updateOrCreate([
                'NEMP' => $this->NM,
                'Nombre' => $this->N,
                'ApP' => $this->ApP,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->CE,
                'CP' => $this->CP,
                'Estado' => $this->EST,
                'Mun' => $this->MUN,
                'Col' => $this->COL,
                'Calle' => $this->CALLE,
                'Referencia' => $this->REF,
                'TipoP' => $this->TP,
                'RFC' => $this->RFC,
                'NumExt' => $this->NEXT,
                'NumInt' => $this->NINT,
                'Estatus' => 'Activo',
                'TipoProv' => $this->TProv,
            ]);
        }
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
        $this->EST = '';
        $this->TProv = '';
    }
    public function redic()
    {
        return redirect()->route('Proveedores');
    }
}
