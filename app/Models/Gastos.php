<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;
    protected $fillable = ['id','Fecha', 'Total','FolioF','FechaF','ficha_id','empresa_id','banco_id','empleado_id'];
    public function banco(){
        return $this->belongsTo("App\Models\Banco");
    }
    public function fichaGasto()
    {
        return $this->belongsTo(FichaGasto::class, 'ficha_id');
    }
}
