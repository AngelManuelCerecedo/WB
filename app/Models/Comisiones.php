<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comisiones extends Model
{
    protected $fillable = ['id','comisionista_id', 'fichai_id','Total'];
    use HasFactory;
}
