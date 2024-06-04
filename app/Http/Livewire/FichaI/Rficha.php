<?php

namespace App\Http\Livewire\FichaI;

use App\Models\Cliente;
use App\Models\Empresa;
use Livewire\Component;

class Rficha extends Component
{
    public $Folio,$Fecha,$Total,$Comision,$empleado_id,$cliente,$empresa_id,$Obs,$Estatus;
    public $searchC,$searchE, $flag = false;
    public $TipoMov,$Monto;
    public function render()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        return view('livewire.fichai.rficha', ['Clientes' => $clientes,'Empresas'=>$empresas]);
    }
    public function mount(){
        $this->Fecha = date('Y-m-d');
    }
    public function agregarMov(){
        $this->flag = true;
    }
}
