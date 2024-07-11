<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable=['id','Nombre','Cel','Rol','Usu','Pwd','Serie','Estatus'];
    public function movimiento(){
        return $this->belongsTo("App\Models\Movimientos");
    }
}
