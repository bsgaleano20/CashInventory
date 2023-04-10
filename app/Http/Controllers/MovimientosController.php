<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Producto;


class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Busqueda de toda la tabla de productos
        $movimientos = Movimiento::all();

        return view('/vistas_compartidas/gestion_movimientos/gestion_movimiento', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        if ($id == 'ruta'){
            $producto = Producto::find('1');
            //Se retorna vista para crear producto
            return view('/vistas_compartidas/gestion_movimientos/crear_movimiento', compact('id', 'producto'));
        }
        else{
            $producto = Producto::find($id);
            return view('/vistas_compartidas/gestion_movimientos/crear_movimiento', compact('id', 'producto')); 
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'STORE';
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
