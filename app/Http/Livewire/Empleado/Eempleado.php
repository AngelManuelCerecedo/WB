<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
use Livewire\Component;

class Eempleado extends Component
{
    public $ide,$Estatus, $CURP, $RFC, $Nombre, $ApM, $ApP, $Cel, $Tel, $Correo, $CP, $Estado, $Mun, $Col, $Calle, $Referencia, $NumExt, $NumInt, $NomRF, $ParenRF, $TelRF, $DomRF, $Rol, $Usu, $Pwd, $sucursal_id;
    public function render()
    {
        $Suc = Sucursal::all();
        return view('livewire.Empleado.Eempleado', ['sucursales' => $Suc]);
    }
    public function mount()
    {
        $empleado = Empleado::where('id', $this->ide)->first();
        $this->Nombre = $empleado->Nombre;
        $this->ApP = $empleado->ApP;
        $this->ApM = $empleado->ApM;
        $this->CURP = $empleado->CURP;
        $this->RFC = $empleado->RFC;
        $this->Cel = $empleado->Cel;
        $this->Tel = $empleado->Tel;
        $this->Correo = $empleado->Correo;
        $this->CP = $empleado->CP;
        $this->Estado = $empleado->Estado;
        $this->Mun = $empleado->Mun;
        $this->Col = $empleado->Col;
        $this->Calle = $empleado->Calle;
        $this->Referencia = $empleado->Referencia;
        $this->NumExt = $empleado->NumExt;
        $this->NumInt = $empleado->NumInt;
        $this->NomRF = $empleado->NomRF;
        $this->ParenRF = $empleado->ParenRF;
        $this->TelRF = $empleado->TelRF;
        $this->DomRF = $empleado->DomRF;
        $this->sucursal_id = $empleado->sucursal_id;
        $this->Rol = $empleado->Rol;
        $this->Usu = $empleado->Usu;
        $this->Pwd = $empleado->Pwd;
        $this->Estatus = $empleado->Estatus;

    }
    public function registrar()
    {
        Empleado::updateOrCreate(
            ['id' => $this->ide],
            [
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
            ]
        );
        User::updateOrCreate(
            ['empleado_id'=> $this->ide],
            [
                'email' => $this->Usu,
                'password' => encrypt($this->Pwd),
                'estatus' => $this->Estatus,
        ]);
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
