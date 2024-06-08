<?php

namespace App\Http\Livewire\FichaI;

use App\Models\Cliente;
use App\Models\Depositos;
use App\Models\Empresa;
use App\Models\FichaIngreso;
use Livewire\Component;

class Rficha extends Component
{
    public $Folio, $Fecha, $Total, $Comision, $Obs, $Estatus;
    public $searchC;
    public function render()
    {
        $clientes = Cliente::all();
        $empresas = Empresa::all();
        return view('livewire.fichai.rficha', ['Clientes' => $clientes, 'Empresas' => $empresas]);
    }
    public function mount()
    {
        $Folio = FichaIngreso::latest()->first();
        $this->Folio = ($Folio) ? $Folio->id + 1 . 'AA' : '1AA'; //SERIE VARIABLE 
        $this->Fecha = date('Y-m-d');
        $this->Estatus = 'Creación';
        $this->Obs = '';
    }
    public function registrar()
    {
        $cliente = Cliente::Where('id', $this->searchC)->first();
        if ($cliente) {
            FichaIngreso::updateOrCreate(
                [
                    'Folio' => $this->Folio,
                    'Fecha' => $this->Fecha,
                    'Estatus' => 'Registro',
                    'cliente_id' => $this->searchC,
                    'Total' => 0,
                    'Tot1' => ($cliente->COMEXT1) ? $cliente->COMEXT1 : 0,
                    'comis1_id' => ($cliente->comis1_id) ? $cliente->comis1_id : null,
                    'Tot2' => ($cliente->COMEXT2) ? $cliente->COMEXT2 : 0,
                    'comis2_id' => ($cliente->comis2_id) ? $cliente->comis2_id : null,
                    'Tot3' => ($cliente->COMEXT3) ? $cliente->COMEXT3 : 0,
                    'comis3_id' => ($cliente->comis3_id) ? $cliente->comis3_id : null,
                    'Tot4' => ($cliente->COMEXT4) ? $cliente->COMEXT4 : 0,
                    'comis4_id' => ($cliente->comis4_id) ? $cliente->comis4_id : null,
                    'Tot5' => ($cliente->COMEXT5) ? $cliente->COMEXT5 : 0,
                    'comis5_id' => ($cliente->comis5_id) ? $cliente->comis5_id : null,
                    //'empleado_id' => $this->searchE,
                    'Obs' => $this->Obs,
                ]
            );
        } else {
            FichaIngreso::updateOrCreate(
                [
                    'Folio' => $this->Folio,
                    'Fecha' => $this->Fecha,
                    'Estatus' => 'Registro',
                    'cliente_id' => $this->searchC,
                    'Total' => 0,
                    'Tot1' =>  0,
                    'Tot2' =>  0,
                    'Tot3' =>  0,
                    'Tot4' =>  0,
                    'Tot5' =>  0,
                    //'empleado_id' => $this->searchE,
                    'Obs' => $this->Obs,
                ]
            );
        }
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
