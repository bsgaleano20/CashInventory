<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';
    protected $fillable = [
        'valor_total_factura',
        'valor_recibido_factura',
        'cambio_factura',
        'estado',
        'Vendedor_id_usuario'
    ];
}
