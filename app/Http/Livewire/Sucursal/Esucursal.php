<?php

namespace App\Http\Livewire\Sucursal;

use App\Models\Sucursal;
use Livewire\Component;

class Esucursal extends Component
{
    public $ide, $ZN, $CLV, $Nombre, $CP, $FT, $FF, $SF, $TEL, $DIR;
    public function render()
    {
        return view('livewire.sucursal.esucursal');
    }
    public function mount(){
        $cat = Sucursal::where('id', $this->ide)->first();
        $this->ZN = $cat->Zona;
        $this->CLV = $cat->Clave;
        $this->Nombre = $cat->Nombre;
        $this->CP = $cat->CP;
        $this->FT = $cat->FolioTicket;
        $this->FF = $cat->FolioFactura;
        $this->SF = $cat->SerieF;
        $this->TEL = $cat->Telefono;
        $this->DIR = $cat->Direccion;
    }
    public function actualizar()
    {
        Sucursal::updateOrCreate(
            ['id' => $this->ide],
            [
                'Zona' => $this->ZN,
                'Clave' => $this->CLV,
                'Nombre' => $this->Nombre,
                'CP' => $this->CP,
                'FolioTicket' => $this->FT,
                'FolioFactura' => $this->FF,
                'SerieF' => $this->SF,
                'Telefono' => $this->TEL,
                'Direccion' => $this->DIR,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro Actualizado exitosamente',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        return redirect()->route('Sucursales');
    }
}
