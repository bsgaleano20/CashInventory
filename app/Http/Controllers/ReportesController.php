<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Usuario;
use App\Models\Producto;
use DB;

class ReportesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $productos = Producto::query()
            ->select('*')
            ->where('cantidad_disponible_t', '<', '30')
            ->get();

        
        $grafica = "productos_bajo_stock";

        return view('administrador\Reporte', compact('productos','grafica'));
    }

    public function productos_mas_vendidos(Request $request)
    {

        $productos = DetalleFactura::select('producto.nombre_producto',
            'detallefactura.Producto_id_producto', 
            'detallefactura.cantidad_producto_factura',
            'producto.cantidad_disponible_t',
            DB::raw('COUNT(detallefactura.Producto_id_producto) as cantidad_repeticiones'))
            ->rightJoin('producto', 'detallefactura.Producto_id_producto', '=', 'producto.id')
            ->groupBy('producto.nombre_producto', 'detallefactura.Producto_id_producto', 'detallefactura.cantidad_producto_factura','producto.cantidad_disponible_t')
            ->havingRaw('count(detallefactura.Producto_id_producto) > 1' )
            ->get();



        $grafica = "productos_mas_vendidos";

        return view('administrador\Reporte', compact('productos', 'grafica'));
    }

    public function vendedores(Request $request)
    {
        $productos = Factura::select('factura.Vendedor_id_usuario',
            'usuarios.nombre_usuario',
            DB::raw('COUNT(factura.Vendedor_id_usuario) as cantidad_repeticiones'))
            ->rightJoin('usuarios', 'factura.Vendedor_id_usuario', '=', 'usuarios.id')
            ->groupBy('usuarios.nombre_usuario', 'factura.Vendedor_id_usuario')
            ->havingRaw('count(factura.Vendedor_id_usuario) > 1')
            ->get();
        
        $grafica = "vendedores";

        return view('administrador\Reporte', compact('productos', 'grafica'));
    }
}
