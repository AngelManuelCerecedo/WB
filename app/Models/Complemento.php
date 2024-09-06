<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complemento extends Model
{
    protected $fillable = ['id','Total', 'Complemento','Fecha','factura_id','movimiento_id'];
    use HasFactory;
}
