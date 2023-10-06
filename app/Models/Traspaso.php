<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traspaso extends Model
{
    use HasFactory;
    protected $fillable=['id','Folio','Aux','almacenO_id','almacenD_id','producto_id','empleadoO_id','Cantidad','Estatus','empleadoD_id','Obs'];
    public function empleado(){
        return $this->belongsTo("App\Models\Empleado");
    }
    public function almacen(){
        return $this->belongsTo("App\Models\Almacen");
    }
    public function producto(){
        return $this->belongsTo("App\Models\Producto");
    }
}
