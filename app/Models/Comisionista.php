<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comisionista extends Model
{
    protected $fillable = ['id','Nombre', 'Total'];
    use HasFactory;
    public function cliente(){
        return $this->hasMany("App\Models\Clientes");
    }
}
