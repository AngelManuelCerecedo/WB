<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    
    protected $fillable=['id','Nombre','NEMP','ApP','TipoProv','Cel','Tel','Correo','CP','Estado','Mun','Col','Calle','TipoP',
    'RFC','NumExt','NumInt','Credito','Estatus','Referencia'];
    public function producto(){
        return $this->hasMany("App\Models\Producto");
    }
    public function compra(){
        return $this->hasMany("App\Models\Compra");
    }
}
