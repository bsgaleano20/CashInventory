<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetalleMovimiento;
use App\Models\Movimiento;
use App\Models\Autorizacion;

class ConsultaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id_movimiento = $request->id_movimiento_actualizar;
        $productos = Producto::all();
        return view('/vistas_compartidas/gestion_movimientos/buscar_producto', compact('productos', 'id_movimiento'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $id)
    {

        // consulta en la BDD todos los registros temporales
        $movimientos_temp = Movimiento::query()
                ->select("*")
                ->where('estado', "=", 'temporal')
                ->get();

        // consultamos producto para añadir el nombre en la actualizacion
        $producto = Producto::find($id);

        // Extraemos el id del usuario logueado en la vista para luego pasarlo en la autorización
        $id_usuario = $request->id_usuario_logueado;

        // Si se está creando un movimiento hacer:
        if($request->id_movimiento_actualizar=="crear_movimiento"){
        
            //Extrae el ID y nombre del movimiento temporal creado
            foreach($movimientos_temp as $movimiento_temp){
                $id_mov = $movimiento_temp -> id;
            }

            // consultamos si existen registos del mismo producto en la tabla de detalles para no duplicarlo
            $query_detalle_mov = DetalleMovimiento::query()
                    ->select("*")
                    ->where('Producto_id_producto', '=', $id)
                    ->where('Movimiento_id_movimiento', '=', $id_mov)
                    ->get();

            // Si no existen registros en detallemovimiento con el mismo producto se crea uno nuevo
            if(empty($query_detalle_mov[0])){

                $id_autorizacion = $id_mov . "_" .$id ;
                $nombre_autorizacion = "Movimiento de " . 0 . " productos (" . $producto->nombre_producto . ")";

                //Se crea una solicitud de autorización
                $autorizacion = Autorizacion::create([
                    'id' => $id_autorizacion,
                    'nombre_autorizacion' => $nombre_autorizacion,
                    'aprobacion_autorizacion' => 'P',
                    'Solicitante_id_usuario' => $id_usuario,
                ]);

                // Se crea un registro en la tabla de detalle movimiento de manera temporal
                $detalle_movimiento_create = DetalleMovimiento::create([
                    'Movimiento_id_movimiento' => $id_mov,
                    'Producto_id_producto' => $id,
                    'cantidad_detalle_movimiento' => 0,
                    'Autorizacion_id_autorizacion' => $id_autorizacion,
                ]);

                return redirect()->route("gestion_movimiento.create");
            }
            else{
                return redirect()->route("gestion_movimiento.create")->with('producto_duplicado', 'Producto ya agregado, favor modifique la cantidad en la parte inferior');
            }
        }

        // Si se está actualizando un movimiento hacer:
        else{

            // consultamos si existen registos del mismo producto en la tabla de detalles para no duplicarlo
            $query_detalle_mov = DetalleMovimiento::query()
                    ->select("*")
                    ->where('Producto_id_producto', '=', $id)
                    ->where('Movimiento_id_movimiento', '=', $request->id_movimiento_actualizar)
                    ->get();

            // Si no existen registros en detallemovimiento con el mismo producto se crea uno nuevo
            if(empty($query_detalle_mov[0])){

                $id_autorizacion = $request->id_movimiento_actualizar . "_" . $id ;
                $nombre_autorizacion = "Movimiento de " . 0 . " productos (" . $producto->nombre_producto . ")";

                //Se crea una solicitud de autorización
                $autorizacion = Autorizacion::create([
                    'id' => $id_autorizacion,
                    'nombre_autorizacion' => $nombre_autorizacion,
                    'aprobacion_autorizacion' => 'P',
                    'Solicitante_id_usuario' => $id_usuario,
                ]);

                // Se crea un registro en la tabla de detalle movimiento de manera temporal
                $detalle_movimiento_create = DetalleMovimiento::create([
                'Movimiento_id_movimiento' => $request->id_movimiento_actualizar,
                'Producto_id_producto' => $id,
                'cantidad_detalle_movimiento' => 0,
                'Autorizacion_id_autorizacion' => $id_autorizacion,
                ]);

                
                return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_actualizar);
                

            }
            else{
                return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_actualizar)->with('producto_duplicado', 'Producto ya agregado, favor modifique la cantidad en la parte inferior');
            }

        }
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        //Se ejecutan validaciones den Backend para que se registre correctamente el producto
        $request->validate([
            'cantidad_movimiento' => ['required', 'numeric'],
            'valor_movimiento' => ['numeric'],
            'fecha_movimiento' => ['required'],
        ]); 

        // Se actualiza producto en la Base de datos
        DetalleMovimiento::where('Producto_id_producto', $id)
            ->where('Movimiento_id_movimiento', $request->Movimiento_id_movimiento)
            ->update([
                'cantidad_detalle_movimiento'=>$request->cantidad_movimiento,
                'valor_detalle_movimiento'=>$request->valor_movimiento,
                'fecha_detalle_movimiento'=>$request->fecha_movimiento,
            ]);

        // consultamos producto para añadir el nombre en la actualizacion
        $producto = Producto::find($id);
        $id_autorizacion = $request->Movimiento_id_movimiento . "_" . $id;
        $nombre_autorizacion = "Movimiento de " . $request->cantidad_movimiento . " productos (" . $producto->nombre_producto . ")";
        Autorizacion::where('id', $id_autorizacion)
            ->update([
                'nombre_autorizacion'=> $nombre_autorizacion,
                'aprobacion_autorizacion'=> 'P',
            ]);

        if($request->store == "creando"){
            return redirect()->route("gestion_movimiento.create")->with('detalle_producto', 'Movimiento de producto actualizado correctamente');
        }
        else{
            return redirect()->route("gestion_movimiento.edit", $request->Movimiento_id_movimiento)->with('detalle_producto', 'Movimiento de producto actualizado correctamente'); 
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
         //Trayendo opciones de filtro de la vista
        $busqueda = $request->get('busqueda');
        $filtro = $request->get('filtro');
        $id_movimiento = $request->id_movimiento_actualizar;

        //si se ejecuta una busqueda vacia se llama toda la tabla
        if($busqueda==""){
            $productos = Producto::all();
        }
        //si se ejecuta con un criterio se realiza select en la BDD
        else{
            $productos = Producto::query()
                ->select("*")
                ->where($filtro, "=", $busqueda)
                ->get();
        }

         //Se retorna vista y resultados encontrados
         return view('/vistas_compartidas/gestion_movimientos/buscar_producto', compact('productos','busqueda','filtro', 'id_movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
         // consulta en la BDD todos los registros temporales
         $movimientos_temp = Movimiento::query()
         ->select("*")
         ->where('estado', "=", 'temporal')
         ->get();

        //si está eliminando un producto de crear movimiendo de mercancia
        if($request->id_movimiento_eliminar=="crear_movimiento"){

            //Extrae el ID y nombre del movimiento temporal creado
            foreach($movimientos_temp as $movimiento_temp){
                $id_mov = $movimiento_temp -> id;
            }

            // Buscar el producto por ID para eliminar
            $query_detalle_mov = DetalleMovimiento::query()
                    ->select("*")
                    ->where('Producto_id_producto', '=', $id)
                    ->where('Movimiento_id_movimiento', '=', $id_mov)
                    ->get();

            if (empty($query_detalle_mov[0])) {
                // Si no se encuentra Producto --NO DEBERIA EJECUTARSE
                return redirect()->route("gestion_movimiento.create")->with('producto_no_encontrado', 'Producto no encontrado. favor revise nuevamente');
            }
            else{
                // Si encuentra el producto
                // elimina el producto que cumpla con las 2 llaves foraneas
                DetalleMovimiento::where('Producto_id_producto', '=', $id)
                    ->where('Movimiento_id_movimiento', '=', $id_mov)
                    ->delete();

                // elimina la solicitud de aprobación relacionada al movimiento del producto
                $id_autorizacion = $id_mov . "_" . $id;
                Autorizacion::where('id', '=', $id_autorizacion)->delete();
                    
                return redirect()->route("gestion_movimiento.create")->with('producto_eliminado', 'Producto eliminado correctamente');
            }
        }

        //si está eliminando un producto de editar movimiendo de mercancia
        else{
            DetalleMovimiento::where('Producto_id_producto', '=', $id)
            ->where('Movimiento_id_movimiento', '=', $request->id_movimiento_eliminar)
            ->delete();

            // elimina la solicitud de aprobación relacionada al movimiento del producto
            $id_autorizacion = $request->id_movimiento_eliminar . "_" . $id;
            Autorizacion::where('id', '=', $id_autorizacion)->delete();

            return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_eliminar)->with('producto_eliminado', 'Producto eliminado correctamente');
        }    
    }
}
