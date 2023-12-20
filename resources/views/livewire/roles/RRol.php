<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class RRol extends Component
{
    public function render()
    {
        $permissions2 = Permission::all();
        return view('livewire.roles.r-rol', ['permissions2' => $permissions2]);
    }

    public function regresar()
    {
        return redirect()->route('Roles');
    }
}
