<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaIngreso extends Model
{
    use HasFactory;
    protected $fillable = ['id','Folio','Fecha', 'Total', 'Comision', 'GastosF','Reintegro','ComisionWB','empleado_id','cliente_id', 'Obs','Estatus','comis1_id', 'Tot1', 'comis2_id', 'Tot2', 'comis3_id', 'Tot3', 'comis4_id', 'Tot4', 'comis5_id', 'Tot5','CRT'];
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente");
    }
    public function comisionista(){
        return $this->belongsTo("App\Models\Comisionista");
    }
    public function comisionista1(){
        return $this->belongsTo(Comisionista::class, 'comis1_id');
    }
    public function comisionista2(){
        return $this->belongsTo(Comisionista::class, 'comis1_id');
    }
    public function comisionista3(){
        return $this->belongsTo(Comisionista::class, 'comis1_id');
    }
    public function comisionista4(){
        return $this->belongsTo(Comisionista::class, 'comis1_id');
    }
    public function comisionista5(){
        return $this->belongsTo(Comisionista::class, 'comis1_id');
    }
    public function movimientos(){
        return $this->hasMany("App\Models\Movimientos");
    }
}
