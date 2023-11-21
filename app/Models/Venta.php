<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable=['id','Fecha','Folio','Aux','Importes','cliente_id','empleado_id','sucursal_id','forma_id'];
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente");
    }
    public function empleado(){
        return $this->belongsTo("App\Models\Empleado");
    }
    public function sucursal(){
        return $this->belongsTo("App\Models\Sucursal");
    }
    public function forma(){
        return $this->belongsTo("App\Models\FormaPago");
    }
    public function Venta_Producto(){
        return $this->hasMany("App\Models\Venta_Producto");
    }
}
