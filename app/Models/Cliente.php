<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['id','Nombre','NomCom','TipoC','Clasificacion','DomicilioF','Reg','CFDI','ApP','ApM','Cel','Tel','Correo','CP','Estado','Mun','Col','Calle','TipoP',
    'RFC','NumExt','NumInt','Credito','Estatus','Referencia','NomRF','ParenRF','TelRF','DomRF'];
    public function cotizacion(){
        return $this->hasMany("App\Models\Cotizacion");
    }
}
