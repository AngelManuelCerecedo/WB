<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;
    protected $fillable = ['id','Movimiento','Fecha', 'Total','FolioF','FechaF','bancoD_id','empresaD_id','Beneficiario','Concepto','fichaG_id','fichaD_id','comisionista_id','cliente_id','formap_id','empresa_id','factura_id','banco_id','empleado_id'];
    public function banco(){
        return $this->belongsTo(Banco::class, 'banco_id');
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
    public function bancoD(){
        return $this->belongsTo(Banco::class, 'bancoD_id');
    }
    public function empresaD(){
        return $this->belongsTo(Empresa::class, 'empresaD_id');
    }
    public function formap(){
        return $this->belongsTo("App\Models\FormaPago");
    }
    public function empleado(){
        return $this->belongsTo("App\Models\Empleado");
    }
    public function fichaG()
    {
        return $this->belongsTo(FichaGasto::class, 'fichaG_id');
    }
    public function fichaI()
    {
        return $this->belongsTo(FichaIngreso::class, 'fichaD_id');
    }
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }
}
