<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Clave', 'Nombre'];
    public function movimiento(){
        return $this->hasMany("App\Models\Movimientos");
    }
}
