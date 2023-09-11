<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $table = 'detallefactura';
    protected $fillable = [
        'Producto_id_producto',
        'Factura_id_factura',
        'cantidad_producto_factura',
        'precio_unitario',
        'total',
    ];
}
