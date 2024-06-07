<?php

namespace App\Http\Livewire\FichaI;

use App\Models\Cliente;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\FichaIngreso;
use Livewire\Component;

class Rficha extends Component
{
    public $Folio,$Fecha,$Total,$Comision,$Obs,$Estatus;
    public $searchC;
    public function render()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        return view('livewire.fichai.rficha', ['Clientes' => $clientes,'Empresas'=>$empresas]);
    }
    public function mount(){
        $Folio = FichaIngreso::latest()->first();
        $this->Folio = ($Folio) ? $Folio->id+1 . 'AA' : '1AA' ;//SERIE VARIABLE 
        $this->Fecha = date('Y-m-d');
        $this->Estatus = 'Creación';
        $this->Obs = '';
    }
    public function registrar(){
        FichaIngreso::updateOrCreate(
            [
                'Folio' => $this->Folio,
                'Fecha' => $this->Fecha,
                'Estatus' => 'Registro',
                'cliente_id' => $this->searchC,
                'Total' => 0,
                //'empleado_id' => $this->searchE,
                'Obs' => $this->Obs,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Registro guardado exitosamente',
            'type' => 'success'
        ]);

        $this->redic();
    }
    public function redic()
    {
        $Ficha = FichaIngreso::Where('Folio', '=', $this->Folio)->first();
        return redirect()->route('EFichaI', [$Ficha->id]);
    }

}
