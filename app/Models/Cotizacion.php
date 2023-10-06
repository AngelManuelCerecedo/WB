<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Folio', 'Aux', 'Estatus', 'Obs', 'almacen_id', 'producto_id','Importe1','Importe2','Importe3','cliente_id','Cliente' ,'empleado_id', 'Cantidad'];
    public function empleado()
    {
        return $this->belongsTo("App\Models\Empleado");
    }
    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente");
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
