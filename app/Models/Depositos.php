<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depositos extends Model
{
    use HasFactory;
    protected $fillable = ['id','Fecha', 'Banco', 'Total','ficha_id','empresa_id', 'Obs'];
}
