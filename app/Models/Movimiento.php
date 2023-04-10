<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimiento';
    protected $fillable = [
        'nombre_movimiento',
        'tipo_movimiento'
    ];
}
