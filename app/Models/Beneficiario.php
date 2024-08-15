<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Nombre', 'Banco', 'Cuenta'];
    public function fichaG(){
        return $this->hasMany("App\Models\FichaGasto");
    }
}
