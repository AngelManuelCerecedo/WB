<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable=['id','Zona','Clave','Nombre','CP','FolioTicket','FolioFactura','SerieF','Telefono','Direccion'];
    public function empleado(){
        return $this->hasMany("App\Models\Empleado");
    }
    public function almacen_p(){
        return $this->hasMany("App\Models\Almacen_Producto");
    }
    public function almacen(){
        return $this->hasMany("App\Models\Almacen");
    }
}
