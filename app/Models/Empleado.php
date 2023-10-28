<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable=['id','CURP','RFC','Nombre','ApP','ApM','Cel','Tel','Correo','CP','Estado','Mun',
    'Col','Calle','Referencia','NumExt','NumInt','NomRF','ParenRF','TelRF','DomRF','Rol','Usu','Pwd','sucursal_id','Estatus'];
    public function sucursal(){
        return $this->belongsTo("App\Models\Sucursal");
    }
    public function traspaso(){
        return $this->hasMany("App\Models\Traspaso");
    }
    public function cotizacion(){
        return $this->hasMany("App\Models\Cotizacion");
    }
    public function compra(){
        return $this->hasMany("App\Models\Compra");
    }
    public function Venta(){
        return $this->hasMany("App\Models\Venta");
    }
}
