<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Producto extends Model
{
    use HasFactory;
    protected $fillable=['id','Cantidad','Descuento','Promo','Precio','producto_id','venta_id','lote_id'];
    public function producto(){
        return $this->belongsTo("App\Models\Producto");
    }
    public function venta(){
        return $this->belongsTo("App\Models\Venta");
    }
}
