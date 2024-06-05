<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaIngreso extends Model
{
    use HasFactory;
    protected $fillable = ['id','Folio','Fecha', 'Total', 'Comision', 'empleado_id','cliente_id', 'Obs','Estatus'];
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente");
    }
}
