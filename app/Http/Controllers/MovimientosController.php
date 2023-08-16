<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\DetalleMovimiento;
use App\Models\Producto;


class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Busqueda de toda la tabla de Movimientos
        $movimientos = Movimiento::all();

        return view('/vistas_compartidas/gestion_movimientos/gestion_movimiento', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //query o consulta con los movimimientos temporales creados
        $movimientos_temp = Movimiento::query()
                ->select("*")
                ->where('estado', "=", 'temporal')
                ->get();

        // Si no existen movimientos temporales en la base de datos crea un movimiento temporal y retorna la vista con el nombre del movimiento
        // Si Existen movimientos temporales en la base de datos retorna la vista con el nombre del temporal existente
        if(empty($movimientos_temp[0])){
            $fecha = date("Ymdhis") ; //fecha y hora para tener un nombre de movimiento temporal único
            $nombre_mov = "temp_" . $fecha;

            $movmiento = Movimiento::create([
                'nombre_movimiento' => $nombre_mov,
                'tipo_movimiento' => 'Pending',
                'estado'=> 'temporal',
            ]) ;

            foreach($movimientos_temp as $movimiento_temp){
                $id_mov = $movimiento_temp -> id;
                $nombre_mov = $movimiento_temp -> nombre_movimiento;
            }

            // $detalle_movimientos = DetalleMovimiento::all();

            $detalle_movimientos = DetalleMovimiento::select('producto.nombre_producto', 
                'detallemovimiento.cantidad_detalle_movimiento',
                'detallemovimiento.valor_detalle_movimiento',
                'detallemovimiento.fecha_detalle_movimiento')
                ->join('producto', 'detallemovimiento.Producto_id_producto', '=', 'producto.id')
                ->where('detallemovimiento.Movimiento_id_movimiento', '=', $id_mov)
                ->get();

            //Se retorna vista para crear Movimiento
            return view('/vistas_compartidas/gestion_movimientos/crear_movimiento', compact('nombre_mov', 'detalle_movimientos'));
        }
        else{

            //recorre el array de resultados que siempre será de 1 por lo que unicamente extrae el nombre del movimiento temporal
            foreach($movimientos_temp as $movimiento_temp){
                $id_mov = $movimiento_temp -> id;
                $nombre_mov = $movimiento_temp -> nombre_movimiento;
            }

            // $detalle_movimientos = DetalleMovimiento::all();

            $detalle_movimientos = DetalleMovimiento::select('producto.nombre_producto',
                'detallemovimiento.Movimiento_id_movimiento', 
                'detallemovimiento.cantidad_detalle_movimiento',
                'detallemovimiento.valor_detalle_movimiento',
                'detallemovimiento.fecha_detalle_movimiento')
                ->join('producto', 'detallemovimiento.Producto_id_producto', '=', 'producto.id')
                ->where('detallemovimiento.Movimiento_id_movimiento', '=', $id_mov)
                ->get();

            // $nombre_mov = ['nombre_movimiento' => $movimientos_temp];
            return view('/vistas_compartidas/gestion_movimientos/crear_movimiento', compact('nombre_mov', 'detalle_movimientos'));
        }
             
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'STORE';

        // return view('/vistas_compartidas/gestion_movimientos/buscar_producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
         //Trayendo opciones de filtro de la vista
         $busqueda = $request->get('busqueda');
         $filtro = $request->get('filtro');
 
         //si se ejecuta una busqueda vacia se llama toda la tabla
         if($busqueda==""){
             $movimientos = Movimiento::all();
         }
         //si se ejecuta con un criterio se realiza select en la BDD
         else{
             $movimientos = Movimiento::query()
                 ->select("*")
                 ->where($filtro, "=", $busqueda)
                 ->get();
         }
 
         //Se retnorna vista y resultados encontrados
         return view('/vistas_compartidas/gestion_movimientos/gestion_movimiento', compact('movimientos','busqueda','filtro'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
