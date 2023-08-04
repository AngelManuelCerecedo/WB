<?php

namespace App\Http\Livewire\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;

class Rsucursal extends Component
{
    public $ZN, $CLV, $Nombre, $CP, $FT, $FF, $SF, $TEL, $DIR;
    public function render()
    {
        return view('livewire.sucursal.rsucursal');
    }
    public function registrar()
    {
        Sucursal::updateOrCreate([
            'Zona' => $this->ZN,
            'Clave' => $this->CLV,
            'Nombre' => $this->Nombre,
            'CP' => $this->CP,
            'FolioTicket' => $this->FT,
            'FolioFactura' => $this->FF,
            'SerieF' => $this->SF,
            'Telefono' => $this->TEL,
            'Direccion' => $this->DIR,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Sucursales');
    }
}
