<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'ALIAS', 'NOMBRE', 'RS', 'RFC', 'CFDI', 'REG', 'DOMF', 'CP', 'COMTOT', 'COMFINTECH', 'COMEXT1', 'COMISIONISTA1', 'COMEXT2', 'COMISIONISTA2', 'COMEXT3', 'COMISIONISTA3', 'COMEXT4', 'COMISIONISTA4', 'COMEXT5', 'COMISIONISTA5'];
}
