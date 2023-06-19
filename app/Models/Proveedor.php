<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    
    protected $fillable=['id','Nombre','NEMP','ApP','ApM','Cel','Tel','Correo','CP','Estado','Mun','Col','Calle','TipoP',
    'RFC','NumExt','NumInt','Credito','Estatus','Referencia'];
}
