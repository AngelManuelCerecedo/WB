<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ERol extends Component
{
    public $ide, $permissions, $role;
    public function render()
    {
        $this->permissions = Permission::all();
        $this->role = Role::where('id', $this->ide)->first();
        return view('livewire.roles.e-rol', [
            'role' => $this->role,
            'permissions' => $this->permissions
        ]);
    }

    public function regresar()
    {
        return redirect()->route('Roles');
    }
}
