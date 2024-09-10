<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $fillable = ['id','Nombre','Total','Cuenta','empresa_id'];
    public function deposito(){
        return $this->hasMany("App\Models\Depositos");
    }
    public function gasto(){
        return $this->hasMany("App\Models\Gastos");
    }
    public function cliente(){
        return $this->hasMany("App\Models\Clientes");
    }
    public function fichaG(){
        return $this->hasMany("App\Models\FichaGasto");
    }
}
