<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaGasto extends Model
{
    protected $fillable = ['id','Folio','Fecha', 'Total', 'Beneficiario','Cuenta','FolioFact','GastosF','formap_id','banco_id','empresa_id','empleado_id','Estatus','Obs'];
    use HasFactory;
    public function gasto(){
        return $this->hasMany("App\Models\Depositos");
    }
}
