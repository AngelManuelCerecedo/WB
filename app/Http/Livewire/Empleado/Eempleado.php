<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\User;
use Livewire\Component;

class Eempleado extends Component
{
    public $ide, $Estatus, $Nombre, $Serie,$Cel, $Rol, $Usu, $Pwd;
    public function render()
    {
        return view('livewire.Empleado.Eempleado');
    }
    public function mount()
    {
        $empleado = Empleado::where('id', $this->ide)->first();
        $this->Nombre = $empleado->Nombre;
        $this->Cel = $empleado->Cel;
        $this->Serie = $empleado->Serie;
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
                'Cel' => $this->Cel,
                'Serie' => $this->Serie,
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
