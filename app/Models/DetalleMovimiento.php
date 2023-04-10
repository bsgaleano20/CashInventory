<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMovimiento extends Model
{
    use HasFactory;

    protected $table = 'detallemovimiento';
    protected $fillable = [
        'Movimiento_id_movimiento',
        'Producto_id_producto',
        'cantidad_detalle_movimiento',
        'valor_detalle_movimiento',
        'fecha_detalle_movimiento',
        'Autorizacion_id_autorizacion',
    ];
}
