<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Folio', 'Aux', 'Estatus', 'Fecha','TipoC','TipoCE','CostoE','ImporteC','ImporteTot','Desc','ImportePag','ImporteporPagar','FechaC','FechaL','Obs', 'almacen_id', 'producto_id','Cantidad','proveedor_id','empleado_id'];
    public function empleado()
    {
        return $this->belongsTo("App\Models\Empleado");
    }
    public function proveedor()
    {
        return $this->belongsTo("App\Models\Proveedor");
    }
    public function almacen()
    {
        return $this->belongsTo("App\Models\Almacen");
    }
    public function producto()
    {
        return $this->belongsTo("App\Models\Producto");
    }
}
