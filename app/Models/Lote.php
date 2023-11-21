<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable=['id','Numero','Fecha','Cantidad','producto_id','compra_id','almacen_id'];
    public function producto(){
        return $this->belongsTo("App\Models\Producto");
    }
    public function Venta_Producto(){
        return $this->hasMany("App\Models\Venta_Producto");
    }
    public function Venta(){
        return $this->hasMany("App\Models\Venta");
    }
}
