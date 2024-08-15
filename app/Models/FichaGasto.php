<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaGasto extends Model
{
    use HasFactory;
    protected $fillable = ['id','Folio','Fecha', 'Total','bene_id','Cuenta','FolioFact','GastosF','formap_id','banco_id','empresa_id','empleado_id','Estatus','Obs','acreedor'];
    public function movimiento(){
        return $this->hasMany("App\Models\Movimientos");
    }
    public function beneficiario(){
        return $this->belongsTo(Beneficiario::class, 'bene_id');
    }
}
