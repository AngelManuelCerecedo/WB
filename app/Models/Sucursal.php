<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable=['id','Zona','Clave','Nombre','CP','FolioTicket','FolioFactura','SerieF','Telefono','Direccion'];
}
