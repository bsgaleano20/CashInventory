<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'producto';
    protected $fillable = [
        'nombre_producto',
        'descripcion_producto',
        'codigo_barras',
        'precio_unitario',
        'cantidad_disponible_b',
        'cantidad_disponible_t',
        'Proveedor',
    ];

}
