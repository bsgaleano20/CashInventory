<?php

namespace App\Http\Controllers;
use App\Models\DetalleFactura;

use Illuminate\Http\Request;

class HomeBodeguistaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $detallefacturas = DetalleFactura::select('producto.nombre_producto',
        'producto.codigo_barras',
        'producto.precio_unitario',
        'detallefactura.Producto_id_producto', 
        'detallefactura.Factura_id_factura',
        'detallefactura.cantidad_producto_factura',
        'detallefactura.precio_unitario',
        'detallefactura.created_at',
        'detallefactura.total')
        ->join('producto', 'detallefactura.Producto_id_producto', '=', 'producto.id')
        ->get();

        return view('/bodeguista/home', compact('detallefacturas'));
    }
}
