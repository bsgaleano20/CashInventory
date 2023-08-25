<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetalleMovimiento;
use App\Models\Movimiento;

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
        // Crear Detalle movimiento con información temporal agregando el producto a la base de datos

        // consulta en la BDD todos los registros temporales
        $movimientos_temp = Movimiento::query()
                ->select("*")
                ->where('estado', "=", 'temporal')
                ->get();


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
                // Se crea un registro en la tabla de detalle movimiento de manera temporal
                $detalle_movimiento_create = DetalleMovimiento::create([
                'Movimiento_id_movimiento' => $id_mov,
                'Producto_id_producto' => $id,
                'cantidad_detalle_movimiento' => 0,
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
                // Se crea un registro en la tabla de detalle movimiento de manera temporal
                $detalle_movimiento_create = DetalleMovimiento::create([
                'Movimiento_id_movimiento' => $request->id_movimiento_actualizar,
                'Producto_id_producto' => $id,
                'cantidad_detalle_movimiento' => 0,
                ]);
                return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_actualizar);
            }
            else{
                return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_actualizar)->with('producto_duplicado', 'Producto ya agregado, favor modifique la cantidad en la parte inferior');
            }

        }
        //Se retorna vista para crear Movimiento
        // return view('/vistas_compartidas/gestion_movimientos/crear_movimiento', compact('nombre_mov', 'detalle_movimientos'))->with('producto_duplicado', 'Producto ya agregado, favor modifique la cantidad');
        

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
 
        $productos = Producto::query()
            ->select("*")
            ->where($filtro, "=", $busqueda)
            ->get();
 
         //Se retnorna vista y resultados encontrados
         return view('/vistas_compartidas/gestion_movimientos/buscar_producto', compact('productos','busqueda','filtro'));
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

        // if(!empty($movimientos_temp[0])){
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
                $delete = DetalleMovimiento::where('Producto_id_producto', '=', $id)
                ->where('Movimiento_id_movimiento', '=', $id_mov)
                ->delete();

                return redirect()->route("gestion_movimiento.create")->with('producto_eliminado', 'Producto eliminado correctamente');
            }
        }
        else{
            $delete = DetalleMovimiento::where('Producto_id_producto', '=', $id)
            ->where('Movimiento_id_movimiento', '=', $request->id_movimiento_eliminar)
            ->delete();

            return redirect()->route("gestion_movimiento.edit", $request->id_movimiento_eliminar)->with('producto_eliminado', 'Producto eliminado correctamente');
        }    
    }
}
