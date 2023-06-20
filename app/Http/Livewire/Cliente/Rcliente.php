<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;

class Rcliente extends Component
{
    public $TP, $RFC, $STS, $NM, $N, $ApP, $ApM, $Cel, $Tel, $CE, $CP, $EST, $MUN, $COL, $CALLE, $NEXT, $NINT, $REF, $LIMC, $DCRED;
    public function render()
    {
        return view('livewire.cliente.rcliente');
    }
}
