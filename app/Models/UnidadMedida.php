<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    protected $fillable=['id','Clave','Nombre'];
    public function producto(){
        return $this->hasMany("App\Models\Producto");
    }
}
