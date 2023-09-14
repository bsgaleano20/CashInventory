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
     * Mostrar vista de ventas 
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

        // Se setea el valor inicial parcial
        $parcial_factura = 0;

        // Si la factura no tiene productos aun agregados se mantienen los valores iniciales 
        if(empty($detalle_facturas[0])){
            $parcial_factura = 0;
            $iva = 0;
            $total_factura = 0;
            $valor_cambio = 0;

        }
        else{

            // De lo contrario si ya se tienen productos en la factura se recorren y se suman sus precios
            foreach($detalle_facturas as $detalle_factura){
                $parcial_factura = $parcial_factura + $detalle_factura->total;
            }
            
            // Se multiplica el valor parcial por IVA del 19%
            $iva = $parcial_factura * 0.19;

            // Se suma el valor pacial mas el IVA
            $total_factura = $parcial_factura + $iva;

            // Se agrega el valor total a la BDD
            Factura::where('id', $id_fact)
                ->update([
                    'valor_total_factura' => $total_factura
                ]);
            
            $factura = Factura::find($id_fact);
            
            // Se setea el valor de cambio para mostrarse en la vista
            $valor_cambio = $factura->cambio_factura;
        }

        $vendedores = Usuario::query()
            ->select("*")
            ->where('Rol_id_rol', "=", 2)
            ->get();

        return view('/vendedor/home', compact('id_fact', 'detalle_facturas', 'vendedores', 'iva', 'parcial_factura', 'total_factura', 'valor_cambio'));    
    }

    /**
     * ELIMINAR PRODUCTOS DE UNA FACTURA
     */
    public function create(Request $request)
    {
        // Se extrae con query el producto que se desea eliminar de la factura y se borra el registro
        DetalleFactura::query()
            ->select("*")
            ->where('Producto_id_producto', $request->id_producto_eliminar)
            ->where('Factura_id_factura', $request->id_factura_eliminar)
            ->delete();
        
        // Se retorna vista
        return redirect()->route('vendedor')->with('editar_producto', 'Producto eliminado correctamente');

    }

    /**
     * CREAR UNA FACTURA (ACTUALIZAR FACTURA TEMPORAL)
     */
    public function store(Request $request)
    {
        // Se actualiza factura para que pase de ser temporal a definitiva, y se registra el usuario con el que se realizó la venta
        Factura::where('id', $request->id_factura)
            ->update ([
                'Vendedor_id_usuario' => $request->vendedor,
                'estado' => 'completado' 
            ]);

        // Se realiza un query de productos agregados a la factura
        $detalle_productos = DetalleFactura::query()
                ->select("*")
                ->where('Factura_id_factura', $request->id_factura)
                ->get();

        // Se recorre el query donde por cada producto se descuenta la cantidad llevada del inventario.
        foreach($detalle_productos as $detalle_producto){
            $cantidad_producto = Producto::find($detalle_producto->Producto_id_producto);
            $nuevo_total = $cantidad_producto->cantidad_disponible_t - $detalle_producto->cantidad_producto_factura;

            Producto::where('id', $detalle_producto->Producto_id_producto)
                ->update([
                    'cantidad_disponible_t'=> $nuevo_total
                ]);
        };

        // Se retorna vista principal
        return redirect()->route('vendedor')->with('editar_producto', 'Factura completada correctamente');
    }

    /**
     * MOSTRAR VALOR DE VUELTAS O CAMBIO
     */
    public function show(Request $request)
    {
        // se busca la factura por ID
        $factura = Factura::find( $request->id_factura );

        // Se resta al valor recibido el valor de la factura arrojando la cantidad del vuelto
        $valor_cambio = $request->valor_recibido - $factura->valor_total_factura;

        // Se registra información en la BDD
        Factura::where('id', $request->id_factura)
            ->update([
                'valor_recibido_factura' => $request->valor_recibido,
                'cambio_factura' => $valor_cambio
            ]);

        // Se retorna vista
        return redirect()->route('vendedor');
    }

    /**
     * AGREGAR PRODUCTO A FACTURA
     */
    public function edit(Request $request)
    {

        // Buscar producto en BDD por codigo de barras        
        $productos = Producto::query()
            ->select("*")
            ->where('codigo_barras', "=", $request->codigo_barras)
            ->get();

        // Extraemos precio y id del producto de la BDD
        foreach($productos as $producto){
            $producto_id = $producto->id;
            $producto_precio = $producto->precio_unitario;
        }

        //Query buscando un registro que ya tenga ese id de producto y ese id de factura
        $detalle_facturas = DetalleFactura::query()
            ->select("*")
            ->where('Producto_id_producto', $producto_id)
            ->where('Factura_id_factura', $request->id_factura)
            ->get();

        // Si el producto no existe en la BDD dentro de la factura editable se realiza una segunda validación
        if(empty($detalle_facturas[0])){
            // Se valida si el producto existe en la BDD, en caso de no ser asi se arroja alerta
            if(empty($productos[0])){
                return redirect()->route('vendedor')->with('agregar_producto', 'Producto no encontrado');
            }
            // Si existe y no ha sido agregado anteriormente se añade a detallefactura y se redirecciona a la vista principal
            else{
                // Si encuentra el producto
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
            //Si el producto ya había sido agregado para evitar duplicidad de IDS y violación de llaves foraneas se arroja una alerta
            return redirect()->route('vendedor')->with('agregar_producto', 'Producto ya agregado');
        }

        
    }

    /**
     * CAMBIAR LA CANTIDAD DE PRODUCTOS
     */
    public function update(Request $request)
    {
        // Se multiplica el valor total del producto por la cantidad de elementos llevados
        $total = $request->cantidad_producto_factura * $request->precio_unitario;

        // Se actualizan cantidades en la BDD
        DetalleFactura::where('Producto_id_producto', $request->id_producto)
            ->where('Factura_id_factura', $request->id_factura)
            ->update([
                'cantidad_producto_factura' => $request->cantidad_producto_factura,
                'total' => $total
            ]);

        // Se retorna vista principal
        return redirect()->route('vendedor')->with('editar_producto', 'Producto actualizado correctamente'); 

    }

    /**
     * ELIMINAR O CANCELAR FACTURA
     */
    public function destroy(string $id)
    {
        // Se busca la factura por su ID
        $registro = Factura::find($id);

        // Se elimina el registro encontrado
        $registro->delete();

        // Se retorna vista principal
        return redirect()->route('vendedor')->with('editar_producto', 'Factura eliminada correctamente');
    }
}
