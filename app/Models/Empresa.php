<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Nombre', 'NCorto', 'RFC', 'Giro', 'B1', 'B2', 'B3', 'B4', 'B5', 'C1','C2', 'C3','C4','C5'];
}
