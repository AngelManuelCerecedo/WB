<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
use Livewire\Component;

class Rempleado extends Component
{
    public $Estatus, $CURP, $RFC, $Nombre, $ApM, $ApP, $Cel, $Tel, $Correo, $CP, $Estado, $Mun, $Col, $Calle, $Referencia, $NumExt, $NumInt, $NomRF, $ParenRF, $TelRF, $DomRF, $Rol, $Usu, $Pwd, $sucursal_id;
    public function render()
    {
        $Suc = Sucursal::all();
        return view('livewire.Empleado.Rempleado', ['sucursales' => $Suc]);
    }
    public function registrar()
    {

        if ($this->Usu != null && $this->Pwd != null) {

            //Creando el empleado
            Empleado::updateOrCreate([
                'Nombre' => $this->Nombre,
                'ApP' => $this->ApP,
                'ApM' => $this->ApM,
                'CURP' => $this->CURP,
                'RFC' => $this->RFC,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->Correo,
                'CP' => $this->CP,
                'Estado' => $this->Estado,
                'Mun' => $this->Mun,
                'Col' => $this->Col,
                'Calle' => $this->Calle,
                'Referencia' => $this->Referencia,
                'NumExt' => $this->NumExt,
                'NumInt' => $this->NumInt,
                'NomRF' => $this->NomRF,
                'ParenRF' => $this->ParenRF,
                'TelRF' => $this->TelRF,
                'DomRF' => $this->DomRF,
                'sucursal_id' => $this->sucursal_id,
                'Rol' => $this->Rol,
                'Usu' => $this->Usu,
                'Pwd' => $this->Pwd,
                'Estatus' => $this->Estatus,
            ]);
            //Creando el usuario
            User::updateOrCreate([
                'name' => $this->Nombre . ' ' . $this->ApP . ' ' . $this->ApM,
                'email' => $this->Usu,
                'password' => encrypt($this->Pwd),
                'estatus' => $this->Estatus,
                'empleado_id' => Empleado::where('Usu', $this->Usu)->first()->id,
            ]);
        } else {
            Empleado::updateOrCreate([
                'Nombre' => $this->Nombre,
                'ApP' => $this->ApP,
                'ApM' => $this->ApM,
                'CURP' => $this->CURP,
                'RFC' => $this->RFC,
                'Cel' => $this->Cel,
                'Tel' => $this->Tel,
                'Correo' => $this->Correo,
                'CP' => $this->CP,
                'Estado' => $this->Estado,
                'Mun' => $this->Mun,
                'Col' => $this->Col,
                'Calle' => $this->Calle,
                'Referencia' => $this->Referencia,
                'NumExt' => $this->NumExt,
                'NumInt' => $this->NumInt,
                'NomRF' => $this->NomRF,
                'ParenRF' => $this->ParenRF,
                'TelRF' => $this->TelRF,
                'DomRF' => $this->DomRF,
                'sucursal_id' => $this->sucursal_id,
                'Estatus' => $this->Estatus,
            ]);
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }

    public function redic()
    {
        return redirect()->route('Empleados');
    }
}
