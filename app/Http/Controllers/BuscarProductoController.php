<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class BuscarProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('/vendedor/buscar_producto', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
            $productos = Producto::all();
        }
        //si se ejecuta con un criterio se realiza select en la BDD
        else{
            $productos = Producto::query()
                ->select("*")
                ->where($filtro, "=", $busqueda)
                ->get();
        }

        //Se retnorna vista y resultados encontrados
        return view('/vendedor/buscar_producto', compact('productos','busqueda','filtro'));
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
