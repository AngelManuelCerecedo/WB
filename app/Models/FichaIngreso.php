<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaIngreso extends Model
{
    use HasFactory;
    protected $fillable = ['id','Folio','Fecha', 'Total', 'Comision', 'GastosF','ComisionWB','empleado_id','cliente_id', 'Obs','Estatus','comis1_id', 'Tot1', 'comis2_id', 'Tot2', 'comis3_id', 'Tot3', 'comis4_id', 'Tot4', 'comis5_id', 'Tot5'];
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente");
    }
    public function comisionista(){
        return $this->belongsTo("App\Models\Comisionista");
    }
    public function movimientos(){
        return $this->hasMany("App\Models\Movimientos");
    }
}
