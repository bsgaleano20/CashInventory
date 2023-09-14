<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Producto;
use Illuminate\Http\Request;

class HistorialFacturaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $facturas = Factura::query()->where('estado', 'completado')->get();

        return view('/vendedor/historial', compact('facturas'));
    }

    public function show (Request $request)
    {
        //Trayendo opciones de filtro de la vista
        $busqueda = $request->get('busqueda');
        $filtro = $request->get('filtro');

        //si se ejecuta una busqueda vacia se llama toda la tabla
        if($busqueda==""){
            $facturas = Factura::query()->where('estado', 'completado')->get();

        }
        //si se ejecuta con un criterio se realiza select en la BDD
        else{
            $facturas = Factura::query()
                ->select("*")
                ->where($filtro, "=", $busqueda)
                ->get();
        }

        return view('/vendedor/historial', compact('facturas'));
    }

    public function detalle_factura (String $id)
    {
        // Se busca los productos correspondientes a la vista y se arrojan a la vista de detalle

        $detalle_facturas = DetalleFactura::select('producto.nombre_producto',
                'producto.codigo_barras',
                'producto.precio_unitario',
                'detallefactura.Producto_id_producto', 
                'detallefactura.Factura_id_factura',
                'detallefactura.cantidad_producto_factura',
                'detallefactura.precio_unitario',
                'detallefactura.total')
                ->join('producto', 'detallefactura.Producto_id_producto', '=', 'producto.id')
                ->where('detallefactura.Factura_id_factura', '=', $id)
                ->get();

        return view('/vendedor/historial_detalle', compact('detalle_facturas'));
    }
}
