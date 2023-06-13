<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Bproveedor extends Component
{
    public function render()
    {
        return view('livewire.bproveedor');
    }
    public function redic()
    {
        return redirect()->route('Proveedores');
    }
}
