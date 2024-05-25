<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Clave', 'Nombre'];
    public function Venta(){
        return $this->hasMany("App\Models\Venta");
    }
    public function pago(){
        return $this->hasMany("App\Models\Pago_Credito");
    }
    public function Pago_Credito(){
        return $this->hasMany("App\Models\Pago_Credito_Compra");
    }
}
