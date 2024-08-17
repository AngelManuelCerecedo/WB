<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Fecha', 'Folio', 'CFDI', 'Concepto', 'Producto', 'Estatus', 'Ejecutivo', 'Credito', 'FComplemento', 'Observaciones', 'Total', 'movimiento_id', 'empresa_id', 'cliente_id', 'empleado_id'];
}
