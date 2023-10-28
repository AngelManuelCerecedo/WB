<?php

namespace App\Http\Livewire\Compra;

use App\Models\Compra;
use Livewire\Component;
use Livewire\WithPagination;

class Bcompra extends Component
{
    use WithPagination;
    public $search;
    public $cantidad = 20;
    public $aux = true;
    public $TC;
    public function render()
    {
        if ($this->TC) {
            $Compras = Compra::Where([['Folio', 'like', '%' . $this->search . '%'],['TipoC', $this->TC],['producto_id',null]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        } else {
            $Compras = Compra::Where([['Folio', 'like', '%' . $this->search . '%'],['producto_id',null]])->orderBy('id', 'desc')
            ->paginate($this->cantidad);
        }
        return view('livewire.compra.bcompra',['compras'=>$Compras]);
    }
}
