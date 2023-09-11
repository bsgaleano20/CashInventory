<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Usuario;
use App\Models\Producto;
use PhpParser\Node\Stmt\Else_;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Verificación de existencia de una factura temporal
        $facturas_temp = Factura::query()
            ->select("*")
            ->where('estado', "=", 'temporal')
            ->get();

        // Si no existen facturas temporales en la base de datos crea una factura temporal y retorna la vista con el nombre de la factura
        if (empty($facturas_temp[0])){

            $factura = Factura::create([
                'valor_total_factura' => '0',
                'Valor_recibido_factura' => '0',
                'cambio_factura' => '0',
                'estado' => 'temporal'
            ]);
        }
        
        // Realizamos busqueda nuevamente dado que creamos un registro en la BDD
        $facturas_temp = Factura::query()
            ->select("*")
            ->where('estado', "=", 'temporal')
            ->get();

        // Recorremos el query con las facturas temporales creadas
        foreach($facturas_temp as $factura_temp){
            $id_fact = $factura_temp -> id;
        }

        // Realiza un innerjoin con la información de detalle factura y producto
        $detalle_facturas = DetalleFactura::select('producto.nombre_producto',
                'producto.codigo_barras',
                'producto.precio_unitario',
                'detallefactura.Producto_id_producto', 
                'detallefactura.Factura_id_factura',
                'detallefactura.cantidad_producto_factura',
                'detallefactura.precio_unitario',
                'detallefactura.total')
                ->join('producto', 'detallefactura.Producto_id_producto', '=', 'producto.id')
                ->where('detallefactura.Factura_id_factura', '=', $id_fact)
                ->get();

        $parcial_factura = 0;

        if(empty($detalle_facturas[0])){
            $parcial_factura = 0;
            $iva = 0;
            $total_factura = 0;
            $valor_cambio = 0;

        }
        else{
            foreach($detalle_facturas as $detalle_factura){
                $parcial_factura = $parcial_factura + $detalle_factura->total;
            }
    
            $iva = $parcial_factura * 0.19;
            $total_factura = $parcial_factura + $iva;

            Factura::where('id', $id_fact)
                ->update([
                    'valor_total_factura' => $total_factura
                ]);

            $factura = Factura::find($id_fact);

            $valor_cambio = $factura->cambio_factura;
        }

        $vendedores = Usuario::query()
            ->select("*")
            ->where('Rol_id_rol', "=", 2)
            ->get();

        return view('/vendedor/home', compact('id_fact', 'detalle_facturas', 'vendedores', 'iva', 'parcial_factura', 'total_factura', 'valor_cambio'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        DetalleFactura::query()
            ->select("*")
            ->where('Producto_id_producto', $request->id_producto_eliminar)
            ->where('Factura_id_factura', $request->id_factura_eliminar)
            ->delete();
        

        return redirect()->route('vendedor')->with('editar_producto', 'Producto eliminado correctamente');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Factura::where('id', $request->id_factura)
            ->update ([
                'Vendedor_id_usuario' => $request->vendedor,
                'estado' => 'completado' 
            ]);

        return redirect()->route('vendedor')->with('editar_producto', 'Factura completada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $factura = Factura::find( $request->id_factura );

        $valor_cambio = $request->valor_recibido - $factura->valor_total_factura;

        Factura::where('id', $request->id_factura)
            ->update([
                'valor_recibido_factura' => $request->valor_recibido,
                'cambio_factura' => $valor_cambio
            ]);

        return redirect()->route('vendedor');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $productos = Producto::query()
            ->select("*")
            ->where('codigo_barras', "=", $request->codigo_barras)
            ->get();

        foreach($productos as $producto){
            $producto_id = $producto->id;
            $producto_precio = $producto->precio_unitario;
        }

        $detalle_facturas = DetalleFactura::query()
            ->select("*")
            ->where('Producto_id_producto', $producto_id)
            ->where('Factura_id_factura', $request->id_factura)
            ->get();

        if(empty($detalle_facturas[0])){
            if(empty($productos[0])){
                return redirect()->route('vendedor')->with('agregar_producto', 'Producto no encontrado');
            }
            else{
    
                DetalleFactura::create([
                    'Producto_id_producto' => $producto_id,
                    'Factura_id_factura' => $request->id_factura,
                    'cantidad_producto_factura' => 1,
                    'precio_unitario' => $producto_precio,
                    'total' => $producto_precio
                ]);
                return redirect()->route('vendedor')->with('agregar_producto', 'Producto Agregado correctamente');
            }
        }
        else{
            return redirect()->route('vendedor')->with('agregar_producto', 'Producto ya agregado');
        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $total = $request->cantidad_producto_factura * $request->precio_unitario;

        DetalleFactura::where('Producto_id_producto', $request->id_producto)
            ->where('Factura_id_factura', $request->id_factura)
            ->update([
                'cantidad_producto_factura' => $request->cantidad_producto_factura,
                'total' => $total
            ]);

        return redirect()->route('vendedor')->with('editar_producto', 'Producto actualizado correctamente'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Factura::find($id);

        $registro->delete();

        return redirect()->route('vendedor')->with('editar_producto', 'Factura eliminada correctamente');
    }
}
