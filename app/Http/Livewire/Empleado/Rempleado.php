<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
use Livewire\Component;

class Rempleado extends Component
{
    public $ide, $Estatus, $Nombre, $Serie,$Cel, $Rol, $Usu, $Pwd;
    public function render()
    {
        return view('livewire.Empleado.Rempleado');
    }
    public function registrar()
    {

        if ($this->Usu != null && $this->Pwd != null) {
            //Creando el empleado
            Empleado::updateOrCreate([
                'Nombre' => $this->Nombre,
                'Cel' => $this->Cel,
                'Serie' => $this->Serie,
                'Rol' => $this->Rol,
                'Usu' => $this->Usu,
                'Pwd' => $this->Pwd,
                'Estatus' => $this->Estatus,
            ]);
            //Creando el usuario
            User::updateOrCreate([
                'name' => $this->Nombre,
                'email' => $this->Usu,
                'password' => encrypt($this->Pwd),
                'estatus' => $this->Estatus,
                'empleado_id' => Empleado::where('Usu', $this->Usu)->first()->id,
            ]);
        } else {
            Empleado::updateOrCreate([
                'Nombre' => $this->Nombre,
                'Cel' => $this->Cel,
                'Rol' => $this->Rol,
                'Usu' => $this->Usu,
                'Pwd' => $this->Pwd,
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
