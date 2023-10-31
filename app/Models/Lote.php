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
}
