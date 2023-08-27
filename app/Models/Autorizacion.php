<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacion extends Model
{
    use HasFactory;

    protected $table = 'autorizacion';
    protected $fillable = [
        'id',
        'nombre_autorizacion',
        'aprobacion_autorizacion',
        'Solicitante_id_usuario',
    ];

    public function getFormattedIdAttribute()
    {
        return str_replace('_', '_', $this->attributes['id']);
    }

}
