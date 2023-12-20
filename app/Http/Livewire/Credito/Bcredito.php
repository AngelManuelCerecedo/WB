<?php

namespace App\Http\Livewire\Credito;

use App\Models\Credito;
use App\Models\Sucursal;
use Livewire\Component;
use Livewire\WithPagination;

class Bcredito extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public $Sucursal;
    public function render()
    {
        $Sucursal = Sucursal::all();
        if ($this->Sucursal) {
            $Creditos = Credito::Where([['Folio', 'like', '%' . $this->search . '%'],['sucursal_id', $this->Sucursal]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        } else {
            $Creditos = Credito::Where([['Folio', 'like', '%' . $this->search . '%']])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        }
        return view('livewire.credito.bcredito',['creditos'=>$Creditos, 'Sucursales'=>$Sucursal]);
    }
}
