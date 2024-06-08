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
}
