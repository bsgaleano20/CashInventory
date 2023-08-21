<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\DetalleMovimiento;

class DetalleMovimientoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {
        $movimiento = Movimiento::find($id);

        $detalle_movimientos = DetalleMovimiento::select('producto.nombre_producto',
                'detallemovimiento.Producto_id_producto', 
                'detallemovimiento.Movimiento_id_movimiento',
                'detallemovimiento.cantidad_detalle_movimiento',
                'detallemovimiento.valor_detalle_movimiento',
                'detallemovimiento.fecha_detalle_movimiento')
                ->join('producto', 'detallemovimiento.Producto_id_producto', '=', 'producto.id')
                ->where('detallemovimiento.Movimiento_id_movimiento', '=', $id)
                ->get();

        return view('vistas_compartidas/gestion_movimientos/detalle_movimiento', compact('movimiento', 'detalle_movimientos'));
    }
}
