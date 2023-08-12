<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['id','CodigoB','Nombre','StockMax','StockMin','Precio'
    ,'P1','P2','P3','P4','P5','P6','P7','P8','P9','P10','Clv1','Clv2','Clv3','Clv4','marca_id','categoria_id','unidad_id','IVA','Estatus','proveedor_id'];
    public function marca(){
        return $this->belongsTo("App\Models\Marca");
    }
    public function categoria(){
        return $this->belongsTo("App\Models\Categoria");
    }
    public function unidad(){
        return $this->belongsTo("App\Models\UnidadMedida");
    }
    public function proveedor(){
        return $this->belongsTo("App\Models\Proveedor");
    }
}
