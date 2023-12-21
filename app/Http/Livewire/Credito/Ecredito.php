<?php

namespace App\Http\Livewire\Credito;

use App\Models\Credito;
use App\Models\FormaPago;
use App\Models\MetodoPago;
use App\Models\Pago_Credito;
use Livewire\Component;

class Ecredito extends Component
{
    public $ide, $FV, $IC, $IP, $IPE, $CLI, $modalMOV = false;
    public $IMP, $FP, $MP, $DATE, $Obs;
    public function render()
    {
        $formas = FormaPago::all();
        $metodos = MetodoPago::all();
        $pagos = Pago_Credito::where('credito_id', $this->ide)->get();
        return view('livewire.credito.ecredito', ['Pagos' => $pagos, 'formas' => $formas, 'metodos' => $metodos]);
    }
    public function mount()
    {
        $TOTP = 0;
        $credito = Credito::where('id', $this->ide)->first();
        $this->FV = $credito->Folio;
        $this->IC = $credito->Total;
        $pagos = Pago_Credito::where('credito_id', $this->ide)->get();
        if ($pagos != 'null') {
            foreach ($pagos as $pago) {
                $TOTP += $pago->Abono;
            }
            $this->IP = $TOTP;
        } else {
            $this->IP = 0;
        }
        $this->IPE = $credito->Total - $this->IP;
        $this->CLI = $credito->Cliente;
        if ($credito->Cliente->TipoP == 'Moral') {
            $this->CLI = $credito->Cliente->NomCom;
        } else {
            $this->CLI = $credito->Cliente->Nombre . ' ' . $credito->Cliente->ApP . ' ' . $credito->Cliente->ApM;
        }
    }
    public function abrirModal()
    {
        $this->modalMOV = true;
    }
    public function cerrarModal()
    {
        $this->modalMOV = false;
    }
    public function abonar(){
        Pago_Credito::updateOrCreate([
            'Abono' => $this->IMP,
            'Observaciones' => $this->Obs,
            'Fecha' => $this->DATE,
            'forma_id' => $this->FP,
            'credito_id' => $this->ide,
        ]);
    }
}
