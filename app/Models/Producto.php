<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable=['id','CodigoB','Nombre','StockMax','StockMin','Precio'
    ,'P1','P2','P3','P4','P5','P6','P7','P8','P9','P10','Clv1','Clv2','Clv3','Clv4','marca_id','categoria_id','unidad_id','IVA','Estatus','proveedor_id',
    'A1','A2','A3','A4','A5','A6','A7','A8','A9','A10','S1','S2','S3','S4','S5','S6','S7','S8','S9','S10'];
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
    public function almacen_p(){
        return $this->hasMany("App\Models\Almacen_Producto");
    }
}
