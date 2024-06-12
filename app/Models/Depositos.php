<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depositos extends Model
{
    use HasFactory;
    protected $fillable = ['id','Fecha', 'Total','FolioF','FechaF','ficha_id','empresa_id','banco_id','empleado_id'];
    public function banco(){
        return $this->belongsTo("App\Models\Banco");
    }
    public function empresa(){
        return $this->belongsTo("App\Models\Empresa");
    }
}
