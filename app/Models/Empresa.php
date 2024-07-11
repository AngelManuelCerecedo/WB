<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Nombre', 'NCorto', 'RFC', 'Giro'];
    public function deposito(){
        return $this->hasMany("App\Models\Depositos");
    }
    public function cliente(){
        return $this->hasMany("App\Models\Clientes");
    }
}
