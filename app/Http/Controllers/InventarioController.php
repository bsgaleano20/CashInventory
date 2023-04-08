<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Busqueda de toda la tabla de productos
        $productos = Producto::all();

        //se retorna vista y array con la tabla de la BDD
        return view('/vistas_compartidas/gestion_producto/gestion_producto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Se retorna vista para crear producto
        return view('/vistas_compartidas/gestion_producto/crear_producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Se ejecutan validaciones den Backend para que se registre correctamente el producto
        $request->validate([
            'nombre' => ['required', 'string', 'max:45'],
            'descripcion' => ['max:45'],
            'codigo_barras' => ['required', 'numeric', 'unique:'.Producto::class],
            'precio' => ['required','numeric'],
            'proveedor' => ['max:70'],
            'cantidad_t' => ['required', 'numeric'],
            'cantidad_b' => ['required', 'numeric'],
        ]);

        //Se crea el producto en la base de datos
        $producto = Producto::create([
            'nombre_producto' => $request->nombre,
            'descripcion_producto' => $request->descripcion,
            'codigo_barras' => $request->codigo_barras,
            'precio_unitario' => $request->precio,
            'cantidad_disponible_b' => $request->cantidad_b,
            'cantidad_disponible_t' => $request->cantidad_t,
            'Proveedor' => $request->proveedor,
        ]);

        //Se retorna a la vista de creación de productos junto con el mensaje de confirmación
        return redirect()->route("gestion_inventario.create")->with('crear_producto', 'Producto Creado Correctamente');
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
        return view('/vistas_compartidas/gestion_producto/gestion_producto', compact('productos','busqueda','filtro'));
    }

    /**
     * Show the form for editing the specified resource.
     */ 
    public function edit(string $id)
    {   
        //Se ubica el producto en específico que se editará
        $producto = Producto::find($id);

        //Se retorna vista con este producto para que sea mostrado en el Front-End
        return view('/vistas_compartidas/gestion_producto/editar_producto', compact('producto','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Se ejecutan validaciones den Backend para que se registre correctamente el producto
        $request->validate([
            'nombre' => ['required', 'string', 'max:45'],
            'descripcion' => ['max:45'],
            'codigo_barras' => ['required', 'numeric'],
            'precio' => ['required','numeric'],
            'proveedor' => ['max:70'],
            'cantidad_t' => ['required', 'numeric'],
            'cantidad_b' => ['required', 'numeric'],
        ]);

        // Se actualiza producto en la Base de datos
        Producto::where('id', $id)->update([
            'nombre_producto' => $request->nombre,
            'descripcion_producto' => $request->descripcion,
            'codigo_barras' => $request->codigo_barras,
            'precio_unitario' => $request->precio,
            'cantidad_disponible_b' => $request->cantidad_b,
            'cantidad_disponible_t' => $request->cantidad_t,
            'Proveedor' => $request->proveedor,

        ]);

        //Se retorna a la vista principal con mensaje de confirmación
        return redirect()->route("gestion_inventario.index")->with('editar_producto', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Verificar si el ID es válido
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->route("gestion_inventario.index")->with('eliminar_producto', 'El ID del producto proporcionado no es válido');
        }
        else{
            // Buscar el producto por ID para eliminar
            $registro = Producto::find($id);

            if (!$registro) {
                // Si no se encuentra Producto --NO DEBERIA EJECUTARSE
                return redirect()->route("gestion_inventario.index")->with('eliminar_producto', 'No se pudo encontrar el producto a eliminar');
            }
            else{
                // Si encuentra el producto
                $registro->delete();
                return redirect()->route("gestion_inventario.index")->with('eliminar_producto', 'Producto eliminado correctamente');
            }
        }
    }
}
