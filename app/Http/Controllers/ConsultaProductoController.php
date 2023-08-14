<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ConsultaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $productos = Producto::query()
        //     ->select("*")
        //     ->where('id', "=", '1')
        //     ->get();
        $productos = Producto::all();
        return view('/vistas_compartidas/gestion_movimientos/buscar_producto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
