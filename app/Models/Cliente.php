<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'ALIAS', 'NOMBRE', 'RS', 'RFC', 'CFDI', 'REG', 'DOMF', 'CP', 'COMTOT', 'COMFINTECH', 'comis1_id', 'COMEXT1', 'comis2_id', 'COMEXT2', 'comis3_id', 'COMEXT3', 'comis4_id', 'COMEXT4', 'comis5_id', 'COMEXT5'];
    public function fichaI(){
        return $this->hasMany("App\Models\FichaIngreso");
    }
    public function comisionista(){
        return $this->belongsTo("App\Models\Comisionista");
    }
}
